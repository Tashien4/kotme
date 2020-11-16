<!--div class="form"-->
<?php $form=$this->beginWidget('CActiveForm'); 
	$language = Yii::app()->getLanguage();
        $dateFormat = 'yy-mm-dd';

        //date format is set from i18n defaults, override it here
        $js = "jQuery.datepicker.regional['$language'].dateFormat = '$dateFormat';";
        Yii::app()->getClientScript()->registerScript('setDateFormat', $js);

?>
          <table><tr><th></th> 
		<td><?php $this->widget('system.zii.widgets.jui.CJuiDatePicker',
				array(
			           'model'=>$model,
			           'attribute'=>'rod',
			           'language'=>$language,
			           'htmlOptions'=>array('size'=>10, 'maxlength'=>15),

			           'options' => array (
				                'showAnim'=>'show',
				                'dateFormat'=>$dateFormat,
					        'showButtonPanel' => true,
				                'showOn' => 'both',
				                'buttonImageOnly' => true,
				                'gotoCurrent' => true,
//						'numberOfMonths' => '[2,3]',
						'showOtherMonths' =>true,
				                'buttonImage'=>'/images/b_calendar.png',
			                //set calendar z-index higher then UI Dialog z-index 
				                'beforeShow'=>"js:function() {
				                    $('.ui-datepicker').css('font-size', '0.8em');
				                    $('.ui-datepicker').css('z-index', parseInt($(this).parents('.ui-dialog').css('z-index'))+1);
				                }",
			            ),
			          )
		        ); ?></td>
           </tr></table> 
	<!--div class="row buttons"-->
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	<!--/div-->

<?php $this->endWidget(); ?>


	<?php echo CHtml::errorSummary($model); ?>

<table width="100%">

	<tr>
		<th> /</th>
		<th> </th>
		<th> </th>
	</tr>
	<tr>
		<td><?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
			)); ?>
			<?php echo CHtml::errorSummary($model); ?>

			<?php
				$this->widget('CAutoComplete',
					    array(
					        'model'=>$sp_streets,
					        'name'=>'stname',
					        'url'=>array('/kladr/stautocomplete/'),
					        'minChars'=>2,
					        'htmlOptions'=>array(
					           'style'=>'widht:50px;',
					           'size'=>'50',
					         ),
					    )
				); 
			?>
			<div id="ingorod" class="row">
				<?php echo $form->label($model,'id_np').' '.$form->dropDownList($model,'id_np',$fornpunkt,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'id_np'); ?>
			</div>  	
			<div class="row buttons">
				<?php echo CHtml::submitButton(''); ?>
			</div>

			<?php $this->endWidget(); ?>
		</td>
		<td><?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
			)); ?>

			<div class="row">
				<?php //echo ' '; ?>
				<?php //echo $form->textField($model,'live'); ?>
				<?php echo ' ->'.$form->checkBox($model,'live',array('->'));?>
			</div>  	

			<div class="row">
				<?php echo $form->label($model,'otk_sub'); ?>
				<?php echo $form->dropDownList($model,'mero_sub',$kladrsub,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'otk_sub'); ?>

				<?php echo $form->label($model,'otk_gor'); ?>
				<?php echo $form->dropDownList($model,'mero_gor',$kladrgor,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'otk_gor'); ?>

				<?php echo $form->label($model,'otk_np'); ?>
				<?php echo $form->dropDownList($model,'mero_np',$kladrnp,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'otk_np'); ?>
			</div>


			<div class="row buttons">
				<?php echo CHtml::submitButton(''); ?>
			</div>

			<?php $this->endWidget(); ?>
		</td>
		<td><?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
			)); ?>

			<div class="row">
				<?php //echo ' '; ?>
				<?php //echo $form->textField($model,'live'); ?>
				<?php echo ' ->'.$form->checkBox($model,'live',array('->'));?>
			</div>  	

			<div class="row">
				<?php echo $form->label($model,'otk_sub'); ?>
				<?php echo $form->dropDownList($model,'mero_sub',$kladrsub,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'otk_sub'); ?>

				<?php echo $form->label($model,'otk_gor'); ?>
				<?php echo $form->dropDownList($model,'mero_gor',$kladrgor,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'otk_gor'); ?>

				<?php echo $form->label($model,'otk_np'); ?>
				<?php echo $form->dropDownList($model,'mero_np',$kladrnp,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'otk_np'); ?>
			</div>


			<div class="row buttons">
				<?php echo CHtml::submitButton(''); ?>
			</div>

			<?php $this->endWidget(); ?>
		</td>

</table><!-- search-form -->
<?php
$js='
$(document).ready(function(){
	        $("#ingorod").hide();
		$("#stname").bind("focusin",	function() {

			      $("#ingorod").show();

						}
				)
		;		
//		$("#stname").bind("blur change select",	function() {
		$("#stname").bind("blur",	function() {
							$("#Fio_id_do").empty();
							var sul=$("#stname").val();	
							var todo={id_ul:$("#stname").val()};
//						alert(" :"+$("#stname").val());
//						alert(" :"+sul+" , :"+todo.id_ul);

							$.post("/index.php/kladr/hauto",
								{id_ul:$("#stname").val()},
								function(data){
									var domsource=[];
									$("Fio_id_do").empty();
//									alert(data.name);
									$.each(data, function(i,val) {  
										domsource.push(val.name);
										$("#Fio_id_do").append("<option value="+val.id+">"+val.name+"</option>");
//										$("#Fio_id_do1").text("<option>"+val.name+"</option>");	
									});
								},
								"json"
							);

						}
				)
		;		

		$("#Fio_id_do").bind("change",	function() {
							$("#Fio_id_bls").empty();
							$.post("/index.php/kladr/blsauto",
								{id_dom:$(this).val()},
								function(data){
									var domsource=[];
									$("Fio_id_bls").empty();
									$.each(data, function(i,val) {  
										$("#Fio_id_bls").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
		$("#Fio_id_np").bind("change",	function() {
							$("#Fio_id_st").empty();
							$.post("/index.php/kladr/stauto",
								{id_np:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Fio_id_st").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
		$("#Fio_id_st").bind("change fokusout select dblclick",	function() {
							$("#Fio_id_do").empty();
							$.post("/index.php/kladr/hstauto",
								{id_st:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Fio_id_do").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
//--------------------------------------------------
		$("#Fio_otk_sub").bind("change",	function() {
							$("#Fio_otk_gor").empty();
							$.post("/index.php/kladr/kladrgorrai",
								{id_sub:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Fio_otk_gor").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		

		$("#Fio_otk_gor").bind("change",	function() {
							$("#Fio_otk_np").empty();
							$.post("/index.php/kladr/kladrnp",
								{id_gor:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Fio_otk_np").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
});	
';
		Yii::app()->getClientScript()->registerCoreScript('jquery');
 
		$cs = Yii::app()->getClientScript();
//		$cs->registerScript(__CLASS__.'#'.$id, $js);
		$cs->registerScript(__CLASS__.'#0', $js);

?>

<!--/div--><!-- form -->