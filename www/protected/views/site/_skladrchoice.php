<?php
/*	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                    'id' => 'skladrchoice',
                    'options' => array(
                        'title' => 'Выбор адреса',
                        'autoOpen' => true,
                        'modal' => true,
                        'resizable'=> true
                    ),
                ));
*/
                $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'skladr-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
//                            'action' => array('site/quick'),
				'action'=>Yii::app()->createUrl($this->route),
				'method'=>'get',
		));
				$model=new Bls;
				$sp_streets=array();
				$bpunkt=$model->id_npunkt;
				$bul=$model->id_ul;
				$bdom=$model->id_dom;
				$forbls=Bls::model()->bls_by_fio($_SESSION['cur_tab']);
				$sp_dom=array(); //Kladr::sp_dom($model->id_ul);
				$fornpunkt=Streets::model()->npunkt();

			echo $form->checkBox($model,'autoli');
			echo '<div id="streetsauto" class="row">';
				$this->widget('CAutoComplete',
					    array(
					        'model'=>array(),
					        'name'=>'stname',
					        'url'=>array('/kladr/stautocomplete/'),
					        'minChars'=>2,
					        'htmlOptions'=>array(
					           'style'=>'widht:50px;',
					           'size'=>'50',
					         ),
					    )
				); 

			echo '</div>';			
			echo '<div id="streetslist" class="row">';
				echo $form->label($model,'id_npunkt').' '.$form->dropDownList($model,'id_npunkt',$fornpunkt,array('size'=>1,'maxlength'=>20)); 
				echo $form->error($model,'id_npunkt'); 

				echo $form->label($model,'id_ul').' '; 
				echo $form->dropDownList($model,'id_ul',$sp_streets,array('size'=>1,'maxlength'=>20)); 
				echo $form->error($model,'id_ul'); 
			echo '</div>';
			echo '<div class="row">';

				echo $form->label($model,'id_dom').' '; 
				//echo $form->textField($model,'id_dom'); 
				echo $form->dropDownList($model,'id_dom',$sp_dom,array('size'=>1,'maxlength'=>20)); 
				echo $form->error($model,'id_dom'); 

				echo $form->label($model,'id');
				echo $form->dropDownList($model,'id',$forbls,array('size'=>1,'maxlength'=>20)); 
				echo $form->error($model,'id'); 
			echo '</div>';

			echo '<div class="row buttons">';
				echo CHtml::submitButton('Сохранить');
			echo '</div>';

//		$this->endWidget();
	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
$js='
$(document).ready(function(){
		if ($("#Bls_autoli").attr("checked")=="checked") {
		      $("#streetsauto").show();
		      $("#streetslist").hide();
		} else {
		      $("#streetsauto").hide();
		      $("#streetslist").show();
		}
		$("#stname").bind("focusin",	function() {

			      $("#ingorod").show();

						}
				)

		;		
		$("#Bls_autoli").bind("change",	function() {
			if ($("#Bls_autoli").attr("checked")=="checked") {
			      $("#streetsauto").show();
			      $("#streetslist").hide();
			} else {
			      $("#streetsauto").hide();
			      $("#streetslist").show();
			}
		});
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

//	$this->endWidget('zii.widgets.jui.CJuiDialog');
?>