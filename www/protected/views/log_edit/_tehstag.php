<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Стаж технических',
				'htmlOptions'=>array('class'=>'operations'),
			));
?>
<table><tr><th>Фамилия</th><th>Лет</th></tr>

<?php				foreach($model as $key=>$data) { ?>
<tr>
<td><?php echo CHtml::link(CHtml::encode($data['fio']),'/index.php/stag/list/'.$data['tab']);?> </td>
<td><?php echo $data['let'];?></td>
</tr>
<?php			} ?>
</table>
<?php			$this->endWidget();?>
