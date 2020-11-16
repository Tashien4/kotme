<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Основные действия',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>Yii::app()->params['workotchetmenu'],
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>

		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Обработка',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		<div id="Based_Calendar" class="Based_Calendar">
			<?php /*$this->widget('application.components.Basedcalendar'
			    , array('title'=>'Календарь'
			        ,'showOn'=>array('stag/view','fio/admin')
			        ,'count'=>4)); */
			?></div><!–- BasedCalendar -–>
		<?php //echo Basedcalendar::formgenerate('FMenTab','layerMenTabel','all');?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>