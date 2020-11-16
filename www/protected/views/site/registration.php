<div class="form">
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form-registration-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if (true) { //$_SERVER['PHP_AUTH_USER']=='aqtgwa') { ?> 
	<p class="note">Fields with <span class="required">*</span> are required.</p>
 
	<?php echo $form->errorSummary($model); ?>
 
	<div class="row">
		<?php echo $form->labelEx($model,'usernamerus'); ?>
		<?php echo $form->textField($model,'usernamerus'); ?>
		<?php echo $form->error($model,'usernamerus'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
 
	<!--div class="row">
		<?php //echo $form->labelEx($model,'admin'); ?>
		<?php //echo $form->textField($model,'admin'); ?>
		<?php //echo $form->error($model,'admin'); ?>
	</div-->
<?php } else { ?> 

	<div class="row">
		<?php echo $form->dropDownList($model,'username',$model->spisokusers(),array('size'=>1,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
 
<?php } ?> 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
 
<?php $this->endWidget(); ?>
 
</div><!-- form -->