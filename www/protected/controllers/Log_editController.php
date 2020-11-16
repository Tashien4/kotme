<?php   
class HisController extends Controller {
	public $layout='//layouts/column2';
	private $_model;

//---------------------------------------------------------
	public function actionIndex()	{
	$this->redirect(array('dislall/list'));
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
				'actions'=>array('update','delete','create','list','all','byfam','tbyfam'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
//---------------------------------------------------------
	public function actionCreate()
	{
		$model=new His;
		if(isset($_POST['His']))
		{
			$model->attributes=$_POST['His'];
//			$model->fio=trim($model->fam).' '.substr($model->im,0,2).'.'.(($model->ot)?(substr($model->ot,0,2).'.'):'');
			if($model->save())
		                $smodel=new Stag;
			        $smodel->tab=$model->tab;
			        $smodel->begin_e=$model->begin;
			        $smodel->predpr='Администрация Серовского городского округа';
			        $smodel->obs=1;
			        $smodel->vysl=1;
				$this->redirect(array('view','id'=>$model->tab));
		}

		$this->render('create',array(
		        'spiotd'=>Site::listotdel(),
			'model'=>$model,
			'fornpunkt'=>Streets::model()->npunkt(),
			'poltype'=>$this->poltype,
		));
	}
//---------------------------------------------------------
	public function actionUpdate()	{
            if (isset($_GET['id'])) {
		$model=His::model()->findByPk($_GET['id']);
		if(isset($_POST['His']))
		{
			$model->attributes=$_POST['His'];
			if (isset($_POST['His']['_data_ret']))
				$model->rbegin=Site::fromrusdat($_POST['His']['_data_ret']);
			if (isset($_POST['His']['_data_out']))
				$model->rend=Site::fromrusdat($_POST['His']['_data_out']);
			if($model->save())
				$this->redirect(array('fio/update'));
		}

		$model->_data_ret=Site::torusdat($model->rbegin);
		$model->_data_out=Site::torusdat($model->rend);

		$fmodel=Fio::model()->findByPk($model->id_fio);
//		$pmodel=Piar::model()->findByPk($model->id_piar);
		$bmodel=Bls::model()->findByPk($model->id_bls);

		Yii::app()->params['workmenu']=
			Yii::app()->params['based_menu']['based'];

		Yii::app()->params['operations']=array();

		$this->render('update',array(
			'model'=>$model,
			'bmodel'=>$bmodel,
//			'pmodel'=>$pmodel,
			'fmodel'=>$fmodel,
			'sp_prv'=>$model->sp_prv(),
		));

            }
	}
//-------------------------------------------------------------
	public function actionDelete($id) {
            if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$model=His::model()->findByPk($id);
		if((Yii::app()->request->isPostRequest) and ($model->id>0))	{
			// we only allow deletion via POST request
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else
			throw new CHttpException(400,'Ошибочное действие. Пожалуйста не повторяйте.');
	    }
	}
//-------------------------------------------------------------
	public function actionError() {
	    if($error=Yii::app()->errorHandler->error) {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
//------------------------------------------------------------------
	public function actionView() {
            if (isset($_GET['id'])) {
		if($fmodel=Fio::model()->findByPk($_SESSION['cur_tab'])) {
			$fmodel->last_reg_id=$_GET['id'];
			$fmodel->coper=Yii::app()->user->id;
			$fmodel->save();
		}
		$this->redirect(array('fio/list'));
	    }
        }
//-----------------------------------------------------
	public function actionByfam()	{
		$id='';
		if(isset($_GET['id'])) {
                    	$id=$_GET['id'];
                }
// 	        $model=$this->loadFModel((isset($_REQUEST['Reestr']['live']))?($_REQUEST['Reestr']['live']):Yii::app()->params['liveonly']);

 	        $model=His::model();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['His'])) {
			$model->attributes=$_GET['His'];
		}
//	        $this->layout='//layouts/a4land';

		Yii::app()->params['workmenu']=
			Yii::app()->params['based_menu']['based'];

		Yii::app()->params['operations']=array();


		$this->render('byfam',array(
			'model'=>$model,
			'temp'=>'1',
			'tab'=>$id,
			'sp_prv'=>$model->sp_prv(),
		));
	}
//------------------------------------------------
	public function actionTbyfam()	{
		$id='';
		if(isset($_GET['id'])) {
                    	$id=$_GET['id'];
                }
// 	        $model=$this->loadFModel((isset($_REQUEST['Reestr']['live']))?($_REQUEST['Reestr']['live']):Yii::app()->params['liveonly']);

 	        $model=His::model();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['His'])) {
			$model->attributes=$_GET['His'];
		}
//	        $this->layout='//layouts/a4land';

		Yii::app()->params['workmenu']=//array_merge(
			Yii::app()->params['based_menu']['based']; //,
//			Yii::app()->params['based_menu']['famcard']
//		);

		Yii::app()->params['operations']=array();


		$this->render('byfam',array(
			'model'=>$model,
			'temp'=>'0',
			'tab'=>$id,
			'sp_prv'=>$model->sp_prv(),
		));
	}
//------------------------------------------------
	public function actionBybls()	{
		$id='';
		if(isset($_GET['id'])) {
                    	$id=$_GET['id'];
                }
// 	        $model=$this->loadFModel((isset($_REQUEST['Reestr']['live']))?($_REQUEST['Reestr']['live']):Yii::app()->params['liveonly']);

 	        $model=His::model();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['His'])) {
			$model->attributes=$_GET['His'];
		}
//	        $this->layout='//layouts/a4land';

		Yii::app()->params['workmenu']=
			Yii::app()->params['based_menu']['based'];

		Yii::app()->params['operations']=array();


		$this->render('bybls',array(
			'model'=>$model,
			'bls'=>$id,
			'histype'=>$this->histype,
//			'apunkt'=> $model->sp_punkt_publicon(1),
//			'nadata'=>Zakaz::model()->publicondata(0),
		));
	}
//------------------------------------------------
}
?>