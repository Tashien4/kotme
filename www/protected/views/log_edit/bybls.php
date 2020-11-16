<?php
echo $histype[1];

$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->adrsearch($bls),
	'columns'=>array(
		array(
			'name'=>'fam',
			'type'=>'raw',
			'value'=>'$data->hfio["fam"]',
		),
		array(
			'name'=>'im',
			'type'=>'raw',
			'value'=>'$data->hfio["im"]',
		),
		array(
			'name'=>'ot',
			'type'=>'raw',
			'value'=>'$data->hfio["ot"]',
		),

		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->id), $data->id)'
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
			'value'=>'His::histype($data->temp)',
		),

/*
		array(
			'name'=>'pasp_nom',
			'type'=>'raw',
			'value'=>'$data->pasp_nom',
		),

		array(
			'name'=>'pasp_kem',
			'type'=>'raw',
			'value'=>'$data->pasp_kem',
		),
*/
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>