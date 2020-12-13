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
        
        if ($exercise > Yii::app()->user->isProgressChar() + 1) {
            $this->_sendResponse(403, 'Задание не открыто');
        }
        
        echo Begin::model()->checkExercise($exercise, $code, $user->id);
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
