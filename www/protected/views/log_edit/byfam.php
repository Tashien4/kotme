<?php
//print_r($sp_prv);
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search($tab,$temp),
	'columns'=>array(
		array(
			'name'=>'hbls["adr"]',
			'type'=>'raw',
			'value'=>'$data->hbls["adr"]',
			'value'=>'CHtml::link(CHtml::encode($data->hbls["adr"]),Yii::app()->baseUrl."/index.php/fio/list/".$data->id_piar)',
		),
		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->hfio["fam"]." ".$data->hfio["im"]." ".$data->hfio["ot"]),Yii::app()->baseUrl."/index.php/fio/update/".$data->id_fio)',
		),


		array(
			'name'=>'rbegin',
			'type'=>'raw',
			'value'=>'Site::rusdat($data->rbegin)',
		),
		array(
			'name'=>'rend',
			'type'=>'raw',
			'value'=>'Site::rusdat($data->rend)',
		),
		array(
			'name'=>'temp',
			'type'=>'raw',
			'value'=>'His::model()->histype[$data->temp]',
		),

		array(
			'name'=>'prvyb',
			'type'=>'raw',
			'value'=>'Site::rusprvyb($data->prvyb)',
//			'value'=>'$data->prvyb',
//			'value'=>'$sp_prv[$data->prvyb]',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>