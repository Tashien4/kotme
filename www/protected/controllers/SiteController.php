<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function accessRules()   {
        	return array(
	            array('deny',
        	        'actions'=>array('page', 'docs','login'),
                	'users'=>array('?'),
	            ),
	            array('allow',
        	        'actions'=>array('newregistration,update,userslist'),
			'expression'=>'(Yii::app()->user->isAdmin())',
        	    ),
	            array('deny',
        	        'actions'=>array('registration'),
                	'users'=>array('*'),
	            ),
        	);
	}

//-----------------------------------------------------------
	/**
	 * Displays the login page
	 */
/*	public function actionLogin()
	{
		$model=new LoginForm;
		Yii::app()->params['operations']=array(
//				array('label'=>'Регистрация нового', 'url'=>array('site/newregistration')),
                        );
		Yii::app()->params['workmenu']=array(
		);


		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				if ((Yii::app()->user->returnUrl)&&(Yii::app()->user->returnUrl!=='/index.php') ){
					$this->redirect(Yii::app()->user->returnUrl);
				} else $this->redirect('/index.php/dela/list'); //Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	   */
//-----------------------------------------------------------
//-----------------------------------------------------------
//-----------------------------------------------------------
	public function actionUpdate() {

            if (isset($_GET['id'])) 
		Yii::app()->params['operations']=array(
			array('label'=>'Регистрация нового', 'url'=>array('site/newregistration')),
                );

		Yii::app()->params['workmenu']=array_merge(
			array(),
			Yii::app()->params['based_menu']['loginadmin']
		);

  		if(isset($_POST['Users'])) {
			$model=Users::model()->findByPk($_GET['id']);
			$model->attributes=$_POST['Users'];
			if($model->validate()) {
				$model->password = sha1(md5($model->login).md5($model->password));
				$model->lastlogin=date("Y-m-d H:i:s");
				$model->save();
			} 
			$model=Users::model();
			$fmodel=new Fio;
			$this->render('userslist',array(
					'model'=>$model,
					'fmodel'=>$fmodel,
			));
		} else {

			$model=Users::model()->findByPk($_GET['id']);
//	        	$this->layout='//layouts/column1';
			$this->render('update',array(
				'model'=>$model,
			));
		}
        }

//-----------------------------------------------------------
	public function actionRe() {
		$model=new Users();
 
	// Если пользователь залогинен - возвращаем его на главную
	if (!Yii::app()->user->isGuest)
	{
		$this->redirect('/');
	}
	// Если форма отправлена
	if(isset($_POST['RegistrationForm']))
	{
		$model->attributes=$_POST['RegistrationForm'];
		// Если форма валидна
		if($model->validate())
		{
			// Создаём пользователя
			$user = new Users();
			$user->name = $model->name;
			$user->login = $model->login;
//			$user->login = $model->login;
			$user->password = sha1(md5($model->lodin).md5($model->password));
//			$user->admin = $model->admin;
			$user->save();
			// Нужно добавить редирект на страницу успешной регистрации.
			// Или отсылку кода активации на ящик.
			// Или ещё что-нибудь ;)
		$this->redirect(Yii::app()->homeUrl);
		}
	}
	// Выводим форму
	$this->render('registration',array('model'=>$model));
    }
//-----------------------------------------------------------
	public function actionUserslist() {
		$tab=0;
print_r($_POST);
		if(isset($_POST['Fio']['newtab']) and ($_POST['Fio']['newtab'])) { 
			$tab=Users::model()->find_users($_POST['Fio']['newtab']);
print '=================='.$tab.'==================<br/>';
		} elseif(isset($_POST['Fio']['tab']) and ($_POST['Fio']['tab']>0)) { 		
			$tab=$_POST['Fio']['tab'];
		}
		if($tab>0) { 		
			Users::model()->activate_users($tab);
			$this->redirect(array('update','id'=>$tab));
		}

/*			if ($tab>0) $model=Fio::model()->findByPk($tab);  
			else {
				$model=New Fio;
				//	if($tab=-1)
					$model->otdel=-1;
		
			}

			if(isset($_POST['Fio_button']) or  (isset($_POST['Fio']['hfio']) and ($_POST['Fio']['hfio']>0))) { 

				if(isset($_POST['Fio_button'])) { 
					$nd=$_POST['Fio']['newdevice'];
//print $nd;
					if (isset($adddevice[$nd])) { // выбрано пустое устройство
						$type=$nd;
					} else {
						list($inv_nom,$type)=explode(':',$nd);
					}
//print $type;
					if ($type>0) {
						$tables=Pc::model()->getTables($type);	
						$obj=strtoupper(substr($tables['fromtable'],0,1)).substr($tables['fromtable'],1);
						if ($obj=='Pc') $model=new Pc;
						elseif ($obj=='Monitors') $model=new Monitors;
						elseif ($obj=='Moduls') $model=new Moduls;
						elseif ($obj=='Printer') $model=new Printer;
						elseif ($obj=='Proch') $model=new Proch;
						elseif ($obj=='HDD') $model=new HDD;
						elseif ($obj=='Netcard') $model=new Netcard;
//print $obj;
						$model->type=$type;
						if (isset($inv_nom)) $model->inv_nom=$inv_nom;

						$model->tab=$tab;
						if ($model->validate()) {
							$model->save();
//						$this->redirect(array('forma','id'=>$model->id));
						} else print_r($model->geterrors());  
					}
				}
				if(isset($_POST['Fio']['tab']) and ($_POST['Fio']['tab']!=$tab)) {
					$this->redirect(array('edit','id'=>$_POST['Fio']['tab']));
				}
			}
*/
		$model=Users::model();
		if(isset($_GET['Users'])) {
			$model->attributes=$_GET['Users'];
		}

/*
		if ($tab>0) $fmodel=Fio::model()->findByPk($tab);  
		else {
*/
			$fmodel=New Fio;
			$fmodel->otdel=-1;
/*		}
*/
//        	$this->layout='//layouts/column2plusmenu';

		Yii::app()->params['operations']=array(
				array('label'=>'Регистрация нового', 'url'=>array('site/newregistration')),
                        );
		Yii::app()->params['workmenu']=array_merge(
			array(),
			Yii::app()->params['based_menu']['loginadmin']
		);




	// Выводим форму
	$this->render('userslist',array('model'=>$model,'fmodel'=>$fmodel));
    }
//-----------------------------------------------------------
	public function actionSkladrchoice() {
		$id=0;
		if (isset($_GET['id'])) $id=$_GET['id'];
		if ($id==0) {
			$response='bls/create';
			$post='Bls_id';
		} else {
			$response='fio/readres';
			$post='Fio_id_bls';
		}

	$this->render('_skladrchoice',array('url'=>$response,'postname'=>$post));
    }
//----------------------
	public function actionIndex() {

                $this->redirect(array('site/login'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
//-----------------------------------------------------------
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		Yii::app()->params['operations']=array(
//				array('label'=>'Регистрация нового', 'url'=>array('site/newregistration')),
                        );
		Yii::app()->params['workmenu']=array(
		);


		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			//print_r($model->attributes);
			
			$sql=sprintf("update users set lastlogin=now() where login='%s'",$model->login);
			Yii::app()->db->createCommand($sql)->execute();
			if ($model->validate() && $model->login()) {
				//if ((Yii::app()->user->returnUrl)&&(Yii::app()->user->returnUrl!=='/index.php') ){
					if (Yii::app()->user->isProgress()>0) {
						$this->redirect('/kotme/www/index.php/begin/cart');
					} else {
						$this->redirect('/kotme/www/index.php/begin/step0'); //Yii::app()->user->returnUrl);
					}
			}
		}
		$this->render('login',array('model'=>$model,'id'=>0));
	}

//-----------------------------------------------------------
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
//-----------------------------------------------------------
	public function actionNewregistration() {
		$model=new Users;
	
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='users')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->validate()) {
				$model->password = sha1(md5($model->login).md5($model->password));
				$model->lastlogin=date("Y-m-d H:i:s");
				$model->save();
			} 
			// validate user input and redirect to the previous page if valid
			if($model->validate()) {// && $model->login()) {
				$this->redirect('/kotme/www/index.php/site/login?log='.$model->login);
			}
		}
		// display the login form
		$this->render('newregistration',array('model'=>$model));
	}
//-----------------------------------------------------------

}