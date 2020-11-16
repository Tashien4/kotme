<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $fmodel->fam.' '.$fmodel->im.' '.$fmodel->ot.' ('.Site::rusdat($fmodel->rod).')'; ?>
	</div>

	<div class="row">
		<?php echo $bmodel->adr; ?>
	</div>

		<?php //echo $form->error($model,'tab'); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'begin_e'); ?>
		<?php /*echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); */?>
		<?php //echo $form->error($model,'begin_e'); ?>
	</div>
	<div class="row">
<?php
	$language = Yii::app()->getLanguage();
//        $dateFormat = 'dd.mm.yy';
        $dateFormat = 'ddmmyy';
//        $dateFormat = 'yy-mm-dd';

        //date format is set from i18n defaults, override it here
        $js = "jQuery.datepicker.regional['$language'].dateFormat = '$dateFormat';";
        Yii::app()->getClientScript()->registerScript('setDateFormat', $js);


        $this->widget('system.zii.widgets.jui.CJuiDatePicker',
          array(
           'model'=>$model,
           'attribute'=>'_data_ret', //rbegin
           'language'=>$language,
           'htmlOptions'=>array('size'=>10, 'maxlength'=>15),
           'options' => array (
 	        "changeYear"=>true,
                'showAnim'=>'show',
                'dateFormat'=>$dateFormat,
                'showButtonPanel' => true,
                'showOn' => 'both',
                'buttonImageOnly' => true,
                'gotoCurrent' => true,
//		'numberOfMonths' => '[2,3]',
		'showOtherMonths' =>true,
                'buttonImage'=>'/images/b_calendar.png',
                //set calendar z-index higher then UI Dialog z-index 
                'beforeShow'=>"js:function() {
                    $('.ui-datepicker').css('font-size', '0.8em');
                    $('.ui-datepicker').css('z-index', parseInt($(this).parents('.ui-dialog').css('z-index'))+1);
                }",
            ),
          )
        );
        $this->widget('system.zii.widgets.jui.CJuiDatePicker',
          array(
           'model'=>$model,
           'attribute'=>'_data_out', //rend',
           'language'=>$language,
           'htmlOptions'=>array('size'=>10, 'maxlength'=>15),
           'options' => array (
 	        "changeYear"=>true,
                'showAnim'=>'show',
                'dateFormat'=>$dateFormat,
                'showButtonPanel' => true,
                'showOn' => 'both',
                'buttonImageOnly' => true,
                'gotoCurrent' => true,
//		'numberOfMonths' => '[2,3]',
		'showOtherMonths' =>true,
                'buttonImage'=>'/images/b_calendar.png',
                //set calendar z-index higher then UI Dialog z-index 
                'beforeShow'=>"js:function() {
                    $('.ui-datepicker').css('font-size', '0.8em');
                    $('.ui-datepicker').css('z-index', parseInt($(this).parents('.ui-dialog').css('z-index'))+1);
                }",
            ),
          )
        );
?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'temp'); ?>
		<?php /*echo $form->dropDownList($model,'temp',Lookup::items('PostStatus')); */?>
		<?php echo $form->dropDownList($model,'temp',$model->histype);?>
		<?php echo $form->error($model,'temp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prvyb'); ?>
		<?php echo $form->dropDownList($model,'prvyb',$sp_prv,array('size'=>1,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'prvyb'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->