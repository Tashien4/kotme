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
							'step1'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
//---------------------------------------------------------

//----------------------------------------------
	public function actionStep1()	{ 
	//	$id=$_GET['id'];
	//	$fmodel=Fio::model()->findByPk($id);
	$model=Begin::model();
//$gurl=" "; 

			$this->render('step1',array('model'=>$model));
}
//----------------------------------------------
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