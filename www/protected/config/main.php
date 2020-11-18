<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

session_start();
if (!isset($_SESSION['cur_mes'])) {
	$_SESSION['cur_npunkt'] = 0;
	$_SESSION['cur_bls'] = 0;
	$_SESSION['cur_dela'] = 0;
	$_SESSION['cur_delas'] = array();
	$_SESSION['cur_adr'] = '';
	$_SESSION['cur_tab'] = 0;
	$_SESSION['cur_fio'] = '';

	$_SESSION['cur_god'] = date('Y');
	$_SESSION['cur_mes'] = date('m');
	if (date('d')<3) {
	   if (date('m') == 1) {
	      $_SESSION['cur_mes'] = 12;
	      $_SESSION['cur_god']--;
	   }
	   else $_SESSION['cur_mes']--;
	}
}

//echo $_GET['rperiod'];

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'KOTme',
	'theme'=>'gen',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'language'=>'ru',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'h>yjcr"',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('10.10.7.5','::1'),
			'newFileMode'=>0666,
		        'newDirMode'=>0777,
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class' => 'WebUser',
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/define',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

                                        		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=kotme',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
        // включаем профайлер
        'enableProfiling'=>true,
        // показываем значения параметров
        'enableParamLogging' => true,
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
//					'class'=>'CFileLogRoute',
//					'levels'=>'error, warning',
            'class'=>'CProfileLogRoute',
            'levels'=>'profile',
            'enabled'=>false,

				),
				// uncomment the following to show log messages on web pages
		/*
				array(
					'class'=>'CWebLogRoute',
				),  
		*/
			),
		),

		'ePdf' => array(
			'class'	=> 'ext.yii-pdf.EYiiPdf',
			'params'=> array(
					'mpdf'	   => array(
							'librarySourcePath' 	=> 'application.vendors.mpdf.*',
							'constants'		=> array(
											'_MPDF_TEMP_PATH' 	=> Yii::getPathOfAlias('application.runtime'),
							),
							'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder.

					),

			),
		),

	),


	'params'=>array(
		'adminEmail'=>'avs@adm-serov.ru',
                'cur_fio'=>'',
                'cur_tab'=>$_SESSION['cur_tab'],
                'cur_otd'=>0,
                'A_fio'=> array("0"=>" " ),
                'A_period'=> array(),
                'A_type'=> array(),
                'tempo' => 0,
                'liveonly' => 1,
                'cur_god'=>$_SESSION['cur_god'],
                'cur_mes'=>$_SESSION['cur_mes'],
		'postsPerPage'=>10,
		// this is used in contact page
		'adminEmail'=>'avs@adm-serov.ru',
		'operations'=>array(	
		//	array('label'=>'Домой', 'url'=>array('dela/list')),
//			array('label'=>'Добавить новую фамилию', 'url'=>array('fio/create')),
		),
                'workmenu'=>array(
		),
		
		'based_menu'=>array(
				'loginadmin'=>array(	
					array('label'=>'-------------------',),
					array('label'=>'Список пользователей', 'url'=>array('site/userslogin')),
//					array('label'=>'Регистрация нового', 'url'=>array('site/newregistration')),
				),
				'service'=>array(	
//					array('label'=>'----------------------',),
					array('label'=>'Разделение баз.л/счета', 'url'=>array('bls/makedouble')),
//					array('label'=>'Создать новый', 'url'=>array(Yii::app()->baseUrl."bls/create/".Yii::app()->params['cur_bls']),
//					array('label'=>'Общий свод по лагерям ', 'url'=>array('dislall/admin')),
//					array('label'=>'Распределение заявок  ', 'url'=>array('dislall/publicon/1')),
				),
				'trouble'=>array(	
					array('label'=>'----------!!!!!----------',),
//					array('label'=>'Двойные ном.свид.рожд.', 'url'=>array('dislall/doublesrnom')),
//					array('label'=>'Возм.ошибочный падеж', 'url'=>array('dislall/padeg')),
//					array('label'=>'Возраст для Поезда ЗД', 'url'=>array('dislall/vozrast')),
				),
				'fiooper'=>array(	
					array('label'=>'Добавить новую фамилию', 'url'=>array('fio/create')),
				),
				'based'=>array(	
					array('label'=>'__Очередь_нуждающихся____', 'url'=>array('dela/list')),
					array('label'=>'Список маневренного жилья', 'url'=>array('bls/all')),
//					array('label'=>'Полные пофамильные списки   ', 'url'=>array('fio/all')),
//					array('label'=>'->Все проживающие по адресу  ', 'url'=>array('fio/list')),
				),
						),

	),
);
