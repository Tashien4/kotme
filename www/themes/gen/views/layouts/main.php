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

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jqueryui/style.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<script>
  $(function() {
    $( "#slider-range-max" ).slider({
      range: "max",
      min: 1,
      max: 10,
      value: <?php echo Yii::app()->user->isProgress();?>,

    });
    
  });
  </script>
<body>

<div class="container" id="page">

	<!--div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?><br><Br></div>
	</div-->
	<div id="mainmenu">
	<div id="nav-menu"><a href="<?php echo Yii::app()->baseUrl;?>/index.php/begin/step0">Меню</a></div>
			<div id="slider-range-max" title="<?php echo Yii::app()->user->isProgress();?>/10"></div>
			<div id="nav-exit"><a href="<?php echo Yii::app()->baseUrl;?>/index.php/site/logout">Выйти</a></div>
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(

				array('label'=>'Техника', 'url'=>array('/reestr/edit', 'id'=>'0')),
				array('label'=>'История', 'url'=>array('/his/jour')),
				array('label'=>'Документы', 'url'=>array('/defect/defect')),
				array('label'=>'Администрирование', 'url'=>array('/site/userslist'), 'visible'=>Yii::app()->user->isUseradmin()),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
                                
			),
		));*/ ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>'',
			'homeLink'=>''
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div id="main-content">
		<?php echo $content; ?>
	</div>

</div><!-- page -->

</body>
</html>
