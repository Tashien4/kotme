<?php
$this->pageTitle=Yii::app()->name . ' - Стаж '.$_SESSION['cur_fam'];
$this->breadcrumbs=array(
	'Сотрудники'=>'/index.php/fio/list',
	 $_SESSION['cur_fam']=>'/index.php/fio/update/'.$_SESSION['cur_tab'],
         'Стаж',
);


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tab',
		'predpr',
		'dolgn',
		'begin_e',
		'end_e',
		'type_e',
		'days',
		'muns',
		'obs',
		'vysl',
	),
)); ?>

