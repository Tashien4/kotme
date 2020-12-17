<?php

/**
 * Main controller
 *
 * @author tashien, zeganstyl
 */
class BeginController extends Controller {

    public $layout = '//layouts/column1';
    private $_model;

//---------------------------------------------------------
    public function actionIndex() {
        $this->redirect(array('begin/list'));
    }

//---------------------------------------------------------
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

//---------------------------------------------------------

    public function accessRules() {
        return array(
            array('allow', // allow all users to access 'index' and 'view' actions.
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated users to access all actions
                'actions' => array('update', 'delete', 'create',
                    'list', 'all', 'cart', 'lessons',
                    'step1', 'step0', 'achivment',
                    'legent', 'exercise', 'check'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

//---------------------------------------------------------

    public function actionCheck() {
        if (!isset($_POST['exercise'])) {
            echo "Задание не указано";
            Yii::app()->end();
        }

        if (!isset($_POST['code'])) {
            echo "Исходный код отсутствует";
            Yii::app()->end();
        }

        $exercise = $_POST["exercise"];
        $code = $_POST["code"];
        $id = Yii::app()->user->id; // user id

        if ($exercise > Yii::app()->user->isProgressChar() + 1) {
            echo "Это задание еще не открыто";
            Yii::app()->end();
        }
        
        echo Begin::model()->checkExercise($exercise, $code, $id);
    }

//---------------------------------------------------------
    public function actionExercise() {
        $exercise = $_GET["n"];

        if ($exercise != NULL) {
            if ($exercise <= Yii::app()->user->isProgressChar() + 1) {
                $model = Begin::model();
                //$content=$model->getMyAnswer($exercise);
                $this->render('exercise', array('model' => $model));
            } else {
                echo "Это задание еще не открыто";
                Yii::app()->end();
            }
        } else {
            echo "Задание не указано";
            Yii::app()->end();
        }
    }

//----------------------------------------------
    public function actionStep0() {

        $model = Begin::model();
        $this->render('step0', array('model' => $model));
    }

//----------------------------------------------
//----------------------------------------------
    public function actionLessons() {
        if (isset($_GET['id']))
            $id = $_GET['id'];
        else
            $id = Yii::app()->user->isProgressChar();
        $model = Lessons::model()->findByPk($id);
        $this->render('lessons', array('model' => $model, 'id' => $id));
    }

//----------------------------------------------
    public function actionStep1() {

        $model = Begin::model();
        $this->render('step1', array('model' => $model));
    }

//----------------------------------------------

    public function actionAchivment() {

        $model = Begin::model();
        $this->render('achivment', array('model' => $model));
    }

//----------------------------------------------

    public function actionLegent() {
        $model = Begin::model();
        $this->render('legent', array('model' => $model));
    }

//----------------------------------------------
    public function actionCart() {
        $model = Begin::model();
        if (isset($_POST['next'])) {
            $this->redirect('/index.php/begin/lessons?id=' . (Yii::app()->user->isProgressChar() + 1));
        }
        $this->render('cart', array('model' => $model));
    }

}

?>