<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,	
    'summaryText'=>'Показано {start}-{end} из {count}',
    'columns'=>array(
//		array(
//			'class'=>'CButtonColumn',
//		),

/*		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'$data->id' //$data->url)'
		),
*/
		array(
			'name'=>'predpr',
			'type'=>'raw',
			'value'=>'$data->predpr'
		),
		array(
			'name'=>'dolgn',
			'type'=>'raw',
//			'value'=>'CHtml::link(CHtml::encode($data->dolgn), "")'
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
			'name'=>'muns',
			'type'=>'raw',
			'value'=>'$data->obs." ".$data->vysl." ".$data->muns'
		),
/*		array(
			'name'=>'obs', 'value'=>'CHtml::checkBox("obs",($data->obs==1),array("value"=>$data->obs,"id"=>"obs_".$data->id))',
			'type'=>'raw',
			'htmlOptions'=>array('width'=>5),
			//'visible'=>false,
		),
		array(
			'name'=>'vysl', 'value'=>'CHtml::checkBox("vysl",($data->vysl==1),array("value"=>$data->vysl,"id"=>"vysl_".$data->id))',
			'type'=>'raw',
			'htmlOptions'=>array('width'=>5),
			//'visible'=>false,
		),
		array(
			'name'=>'muns', 'value'=>'CHtml::checkBox("muns",($data->muns==1),array("value"=>$data->muns,"id"=>"muns_".$data->id))',
			'type'=>'raw',
			'htmlOptions'=>array('width'=>5),
			//'visible'=>false,
		),
*/
		array(
			'class'=>'CButtonColumn',
		),


	),
));
?>
