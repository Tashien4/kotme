	<?php echo CHtml::errorSummary($model); ?>
<h1>Создание нового адреса</h1>

		<?php $form=$this->beginWidget('CActiveForm', array(
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
				<?php echo $form->label($model,'id_npunkt').' '.$form->dropDownList($model,'id_npunkt',$fornpunkt,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'id_npunkt'); ?>

				<?php echo $form->label($model,'id_ul').' '; ?>
				<?php echo $form->dropDownList($model,'id_ul',$sp_streets,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'id_ul'); ?>

				<?php echo $form->label($model,'id_dom').'('.$bdom.') '; ?>
				<?php //echo $form->textField($model,'id_dom'); ?>
				<?php echo $form->dropDownList($model,'id_dom',$sp_dom,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'id_dom'); ?>

			</div>  	
			<div class="row">
				<?php echo $form->label($model,'id'); ?>
				<?php echo $form->dropDownList($model,'id',$forbls,array('size'=>1,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'id'); ?>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Сохранить'); ?>
			</div>

			<?php $this->endWidget(); ?>

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
							$("#Bls_id_dom").empty();
							var sul=$("#stname").val();	
							var todo={id_ul:$("#stname").val()};
//						alert("На выходе:"+$("#stname").val());
//						alert("На выходе:"+sul+" , об:"+todo.id_ul);

							$.post("/index.php/kladr/hauto",
								{id_ul:$("#stname").val()},
								function(data){
									var domsource=[];
									$("Bls_id_dom").empty();
//									alert(data.name);
									$.each(data, function(i,val) {  
										domsource.push(val.name);
										$("#Bls_id_dom").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);

						}
				)
		;		

		$("#Bls_id_dom").bind("change",	function() {
							$("#Bls_id").empty();
							$.post("/index.php/kladr/blsauto",
								{id_dom:$(this).val()},
								function(data){
									var domsource=[];
									$("Bls_id").empty();
									$.each(data, function(i,val) {  
										$("#Bls_id").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
		$("#Bls_id_npunkt").bind("change",	function() {
							$("#Bls_id_ul").empty();
							$.post("/index.php/kladr/stauto",
								{id_np:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Bls_id_ul").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
		$("#Bls_id_ul").bind("change fokusout select dblclick",	function() {
							$("#Bls_id_dom").empty();
							$.post("/index.php/kladr/hstauto",
								{id_st:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Bls_id_dom").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
						}
				)
		;		
});';

		Yii::app()->getClientScript()->registerCoreScript('jquery');
 
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(__CLASS__.'#0', $js);

?>