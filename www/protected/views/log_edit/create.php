<?php
$this->pageTitle=Yii::app()->name . ' - Стаж '.$_SESSION['cur_fam'];
$this->breadcrumbs=array(
	'Сотрудники'=>'/index.php/fio/list',
	 $_SESSION['cur_fam']=>'/index.php/fio/update/'.$_SESSION['cur_tab'],
         'Стаж',
);
?>
<h1>Добавление новой записи о стаже</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'gruppatype'=>$gruppatype)); ?>