<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * REST API
 *
 * @author zeganstyl
 */
class ApiController extends Controller {
    
    public function actionCheck_Code() {
        $user = $this->_checkAuth();
        
        if (!isset($_POST['exercise'])) {
            $this->_sendResponse(400, 'Задание не указано');
        }

        if (!isset($_POST['code'])) {
            $this->_sendResponse(400, 'Исходный код отсутствует');
        }
        
        $exercise = $_POST["exercise"];
        $code = $_POST["code"];
        
        if ($exercise > $user->progerss + 1) {
            $this->_sendResponse(403, 'Задание не открыто');
        }
        
        echo Begin::model()->checkExercise($exercise, $code, $user->id);
    }
    
    public function actionProgress() {
        $user = $this->_checkAuth();
        
        $sql = Yii::app()->db->createCommand("
        SELECT *
        FROM user_achivment
        where user_id=" . $user->id);
        $rows = $sql->query();
        
        $achievements = array();
        foreach ($rows as $row) {
            array_push($achievements, $row["achiv_id"]);
            }
        
        echo json_encode(
                array(
                    'progress' => $user->progerss,
                    'achievements' => $achievements
                    )
                );
    }
    
    public function actionCached_code() {
        $user = $this->_checkAuth();
        
        $exercise = $_POST["exercise"];
        
        $sql = Yii::app()->db->createCommand("
        SELECT *
        FROM user_code
        where user_id=" . $user->id . " and task=" . $exercise);
        $row = $sql->queryRow();
        
        if (!empty($row)) {
            echo $row["code"];
        } else {
            echo ""; // TODO возвращать изначальный код
        }
    }
    
    public function actionSync_all() {
        $user = $this->_checkAuth();
        
        $sql = Yii::app()->db->createCommand("
        SELECT *
        FROM user_code
        where user_id=" . $user->id);
        $codeRows = $sql->query();
        
        $codeJson = array();
        $i = 0;
        foreach ($codeRows as $row) {
            $codeJson[$i] = $row["code"];
            $i++;
        }
        
        $sql2 = Yii::app()->db->createCommand("
        SELECT *
        FROM user_achivment
        where user_id=" . $user->id);
        $achivRows = $sql2->query();
        
        $achivJson = array();
        foreach ($achivRows as $row) {
            array_push($achivJson, $row["achiv_id"]);
        }
        
        echo json_encode(
                array(
                    "progress" => $user->progerss,
                    "achievements" => $achivJson,
                    "code" => $codeJson
                )
                );
    }
    
    public function actionCheck_Auth() {
        $this->_checkAuth();
    }

    private function _checkAuth() {
        
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if (!(isset($_POST['username']) and isset($_POST['password']))) {
            // Error: Unauthorized
            $this->_sendResponse(401);
        }
        $username = $_POST["username"];
        $password = $_POST["password"];
        // Find the user
        $user = Users::model()->findByAttributes(array('login'=>$username));
        
        if ($user === null) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: Login or Password is invalid');
        } else if ($user->password!==sha1(md5($username).md5($password))) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: Login or Password is invalid');
        }
        
        return $user;
    }

    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html') {
        // set the status
        header('HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status));
        // and the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if ($body != '') {
            // send the body
            echo $body;
        } else {
            echo $this->_getStatusCodeMessage($status);
        }
        Yii::app()->end();
    }

    private function _getStatusCodeMessage($status) {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

}
