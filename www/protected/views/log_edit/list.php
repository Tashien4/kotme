<?php
$this->pageTitle=Yii::app()->name . ' - Стаж '.$_SESSION['cur_fam'];
$this->breadcrumbs=array(
	'Сотрудники'=>'/index.php/fio/list',
	 $_SESSION['cur_fam']=>'/index.php/fio/update/'.$_SESSION['cur_tab'],
         'Стаж',
);
$this->menu=array(
	array('label'=>'Добавить новую строку', 'url'=>array('create')),
	array('label'=>'Просмотр общего списка', 'url'=>array('admin')),
);?>
<table>
<tr><th> Общий </th><td> <?php echo $nobs; ?></td></tr> 
<tr><th> Наш </th><td> <?php echo $nvys; ?></td></tr>
<tr><th>Муниципальный стаж:</th><td> <?php echo '<b>'.$nmun; ?> </td></tr>
</table>
<?php
$this->renderPartial('_list', array('dataProvider'=>$dataProvider)); 
?>
