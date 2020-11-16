<?php
$this->breadcrumbs=array(
	'Сотрудники'=>'/index.php/fio/list',
	'Стажи (общий список)',
);

$this->menu=array(
//	array('label'=>'СоНа список ', 'url'=>array('/fio/list')),
//	array('label'=>'Создать новую запись', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('stag-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>СТАЖИ. Общий список (для поиска)</h2>

<p>Можно использовать сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) и поиск буквосочетаний в колонке.</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stag-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'tab',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->tab), "list/".$data->tab)'
//			'value'=>'$data->dolgn'
		),

		array(
			'name'=>'predpr',
			'type'=>'raw',
			'value'=>'$data->predpr'
		),
		array(
			'name'=>'dolgn',
			'type'=>'raw',
//			'value'=>'CHtml::link(CHtml::encode($data->dolgn), "")'
//			'value'=>'CHtml::link(CHtml::encode($data->tab), "list/".$data->tab)'
			'value'=>'$data->dolgn'
		),
		array(
			'name'=>'begin_e',
			'type'=>'raw',
//			'value'=>'date("M j, Y",$data->begin_e)'
			'value'=>'(($data->begin_e!="0000-00-00")?(substr($data->begin_e,8,2).".".substr($data->begin_e,5,2).".".substr($data->begin_e,0,4)):" ")',
		),
		array(
			'name'=>'end_e',
			'type'=>'raw',
			'value'=>'(($data->end_e!="0000-00-00")?(substr($data->end_e,8,2).".".substr($data->end_e,5,2).".".substr($data->end_e,0,4)):" ")',
		),
		array(
			'name'=>'days',
			'type'=>'raw',
			'value'=>'$data->days'
		),
		array(
			'name'=>'obs',
			'type'=>'raw',
			'value'=>'$data->obs'
		),
		array(
			'name'=>'vysl',
			'type'=>'raw',
			'value'=>'$data->vysl'
		),
		array(
			'name'=>'muns',
			'type'=>'raw',
			'value'=>'$data->muns'
		),

//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
