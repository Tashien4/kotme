<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Стаж',
);
$dataProvider=new CActiveDataProvider('Stag');

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
));

?>
<?php echo CHtml::form(); ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
<tr><th></th><th>⮨</th><th>⢮</th><th>ᠭ</th></tr>
<?php foreach($items as $i=>$item): ?>
<tr>
<td><?php //echo CHtml::activeTextField($item,"[$i]begin_e"); ?></td>
<td><?php //echo CHtml::activeTextField($item,"[$i]end_e"); ?></td>
<td><?php //echo CHtml::activeTextField($item,"[$i]predpr"); ?></td>
<td><?php //echo CHtml::activeTextArea($item,"[$i]dolgn"); ?></td>
</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Сохранить'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->