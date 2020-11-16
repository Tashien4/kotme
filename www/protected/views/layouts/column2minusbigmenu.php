<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo 'Текущий период:'.Site::ntocmonth($_SESSION['cur_mes']).' '.Yii::app()->params['cur_god'].' г.'; ?></div>
	</div><!-- header -->

	<!--div id="mainmenu">
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Сотрудники', 'url'=>array('/fio/list')),
				array('label'=>'Графики отпусков', 'url'=>array('/otperiod/grafik0','view'=>$_SERVER['PHP_AUTH_USER'])),
//				array('label'=>'Графики отпусков', 'url'=>array('/tabprn/print'), 'visible'=>(Yii::app()->params['username']=='Отдел кадров')),
				array('label'=>'Печать табелей', 'url'=>array('/tabprn/print'), 'visible'=>(Yii::app()->params['username']=='Бухгалтерия')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); */?>
	</div--><!-- mainmenu -->
	<?php /*if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/?>

	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="container">
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Основные действия',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		<div id="Based_Calendar" class="Based_Calendar">
			<?php /*$this->widget('application.components.Basedcalendar'
			    , array('title'=>'Календарь'
			        ,'showOn'=>array('stag/view','fio/admin')
			        ,'count'=>4)); */
			?></div><!–- BasedCalendar -–>
		<?php //echo Basedcalendar::formgenerate('FMenTab','layerMenTabel','all');?>
		</div><!-- sidebar -->
	</div>
	</div>
	<div id="footer">
		<a href='http://www.adm-serov.ru'>Администрация Серовского городского округа.</a><br/>
<?php //echo date('Y'); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>