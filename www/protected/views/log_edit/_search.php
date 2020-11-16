<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tab'); ?>
		<?php echo $form->textField($model,'tab'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'predpr'); ?>
		<?php echo $form->textField($model,'predpr',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dolgn'); ?>
		<?php echo $form->textField($model,'dolgn',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'begin_e'); ?>
		<?php echo $form->textField($model,'begin_e'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_e'); ?>
		<?php echo $form->textField($model,'end_e'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_e'); ?>
		<?php echo $form->textField($model,'type_e',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'days'); ?>
		<?php echo $form->textField($model,'days'); ?>
	</div>

	<!--div class="row">
		<?php //echo $form->label($model,'n_dipl'); ?>
		<?php //echo $form->textField($model,'n_dipl',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'data_dipl'); ?>
		<?php //echo $form->textField($model,'data_dipl'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'based'); ?>
		<?php //echo $form->textField($model,'based',array('size'=>1,'maxlength'=>1)); ?>
	</div-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->