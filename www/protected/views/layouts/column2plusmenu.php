<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last" align=center>
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Основные действия',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>Yii::app()->params['workmenu'],
				'htmlOptions'=>array('class'=>'workmenu'),
			));
			$this->endWidget();  
		?>
	<p class="zwishen"/>
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Возможные действия:',
			));

			if (isset(Yii::app()->params['operations'])) 
				$this->widget('zii.widgets.CMenu', array(
					'items'=>Yii::app()->params['operations'],
					'htmlOptions'=>array('class'=>'operations'),
				));
			$this->endWidget();
		?>
		<?php //echo Basedcalendar::formgenerate('FMenTab','layerMenTabel','all');?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>