<?php

class BeginController extends Controller {
	public $layout='//layouts/column1';
	private $_model;

//---------------------------------------------------------
	public function actionIndex()	{
	$this->redirect(array('begin/list'));
}
//---------------------------------------------------------
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

//---------------------------------------------------------

	public function accessRules()	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'actions'=>array('update','delete','create','list','all','cart',
							'step1','step0','achivment','legent'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
//---------------------------------------------------------

//----------------------------------------------
	public function actionStep0()	{ 

	$model=Begin::model();
$this->render('step0',array('model'=>$model));
}

//----------------------------------------------
public function actionStep1()	{ 

	$model=Begin::model();
			$this->render('step1',array('model'=>$model));
}
//----------------------------------------------

public function actionAchivment()	{ 

	$model=Begin::model();
$this->render('achivment',array('model'=>$model));
}
//----------------------------------------------

public function actionLegent()	{ 

	$model=Begin::model();
$this->render('legent',array('model'=>$model));
}
//----------------------------------------------
public function actionCart()	{ 
	//	$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
	$model=Begin::model();
//$gurl=" "; 

			$this->render('cart',array('model'=>$model));
			

}
}	
?>