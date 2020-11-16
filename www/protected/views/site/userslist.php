<?php
//$this->breadcrumbs=array(
//	'Работа со списком',
//);

$this->menu=array(
//	array('label'=>'Списком', 'url'=>array('index')),
//	array('label'=>'Создать новую запись', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reestr-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h3><?php echo 'Список зарегистрированных. ';//('.$model->live.')'.(isset($_SESSION['myerror']))?$_SESSION['myerror']:""; ?></h3>
<?php echo CHtml::link('Добавить','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
        'fmodel'=>$fmodel,
)); ?>
</div><!-- search-form -->

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo 'Только действующих'; ?>
		<?php //echo $form->textField($model,'live'); ?>
		<?php //echo 'Только действующих->'.$form->checkBox($model,'live',array('->'));?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'uk'); ?>
		<?php //echo $form->dropDownList($model,'id_np',$fornpunkt,array('size'=>1,'maxlength'=>20,'onchange'=>'submit();')); ?>
		<?php //echo $form->dropDownList($model,'uk',$foruk,array('size'=>1,'maxlength'=>20,'onchange'=>'submit();','ondblclick'=>'submit();')); ?>
		<?php //echo $form->error($model,'uk'); ?>
	</div>

	<div class="row">
		<?php /*$this->widget('CAutoComplete',
			    array(
			        'model'=>'fio',
			        'name'=>'Fio[tab]',
  			        'value'=>$fmodel->tab,
//			        'ajaxUpdate'=>true,
			        'url'=>array('/reestr/fioautocomplete'),
			        'minChars'=>2,
			        'htmlOptions'=>array(
			           'style'=>'height:10px;',
			           'size'=>'7',
				   'onchange'=>'submit();'
		         	),
			    )
			); 
*/
		?>
	</div>
	<div class="row">
		<?php //echo $form->labelEx($model,'id_npunkt'); ?>
		<?php //echo $form->dropDownList($model,'id_np',$fornpunkt,array('size'=>1,'maxlength'=>20,'onchange'=>'submit();')); ?>
		<?php //echo $form->dropDownList($model,'id_npunkt',$fornpunkt,array('size'=>1,'maxlength'=>20,'onchange'=>'submit();','ondblclick'=>'submit();')); ?>
		<?php //echo $form->error($model,'id_npunkt'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отобрать'); ?>
	</div>



<?php $this->endWidget(); ?>


<?php 
$dopf=(isset($dopfilter))?$dopfilter:array();
//echo $dopf;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ls-grid',
        'ajaxUpdate'=>false,
	'dataProvider'=>$model->search($dopf),
	'filter'=>$model,
	'columns'=>array(
/*
		array(
			'name'=>'adr',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->adr),Yii::app()->baseUrl."/index.php/fio/list/".$data->id_piar)',
		),
		array(
			'name'=>'uk',
			'type'=>'raw',
			'value'=>'$data->uk',
		),
		array(
			'name'=>'dom1',
			'type'=>'raw',
			'value'=>'$data->dom1',
		),
		array(
			'name'=>'dom2',
			'type'=>'raw',
			'value'=>'$data->dom2',
		),
		array(
			'name'=>'kv',
			'type'=>'raw',
			'value'=>'$data->kv',
		),
		array(
			'name'=>'fio',
			'type'=>'raw',
			'value'=>'$data->fio',
		),
		array(
			'name'=>'vids',
			'type'=>'raw',
			'value'=>'$data->vids',
		),
		array(
			'name'=>'sq',
			'type'=>'raw',
			'value'=>'$data->sq',
		),
		array(
			'name'=>'kol',
			'type'=>'raw',
			'value'=>'$data->kol',
		),
		array(
			'name'=>'irc_uni',
			'type'=>'raw',
			'value'=>'CHtml::link($data->irc_uni,"update/".$data->id)',
		),
		array(
			'name'=>'ee_ls',
			'type'=>'raw',
			'value'=>'$data->ee_ls',
		),
		array(
			'name'=>'begin',
			'type'=>'raw',
			'value'=>'Site::rusdat($data->begin)." ".Site::rusdat($data->end)',
		),
//		array(
//			'name'=>'end',
//			'type'=>'raw',
//			'value'=>'Site::rusdat($data->end)',
//		),


		array(
			'name'=>'dop100',
			'type'=>'raw',
			'value'=>'$data->dop100."".(($data->dop1==1)?"(БЮДЖЕТ)":"")'
//			'value'=>'$data->dop100." ".$data->dop1'
//			'value'=>'(substr($data->snils,0,3)."-".substr($data->snils,3,3)."-".substr($data->snils,6,3)." ".substr($data->snils,9,2))'
		),

		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("Заявки"), Yii::app()->baseUrl."/index.php/reestr/update/".$data->id)',
		),
*/
		array(
			'name'=>'usernamerus',
			'type'=>'raw',
			'value'=>'$data->usernamerus',
		),
		array(
			'name'=>'lastlogin',
			'type'=>'raw',
			'value'=>'Site::rusdat($data->lastlogin)',
		),

		array(
			'name'=>'active_bit',
			'type'=>'raw',
			'value'=>'$data->active_bit',
		),
		array(
			'name'=>'active_docs',
			'type'=>'raw',
			'value'=>'$data->active_docs',
		),

		array(
			'name'=>'usersadmin',
			'type'=>'raw',
			'value'=>'$data->usersadmin',
		),
		array(
			'name'=>'tel',
			'type'=>'raw',
			'value'=>'$data->tel',
		),
		array(
			'class'=>'CButtonColumn',
		),

	),
)); ?>

<?php 
$jsr='
//		$("#Fio_tab").empty();
//			$.post("/index.php/reestr/manauto",
//				{id_org:'.$fmodel->otdel.'},
//				function(data){
//					$.each(data, function(i,val) {  
//						$("#Fio_tab").append("<option value="+val.id+">"+val.name+"</option>");
//					});
//				},
//				"json"
//		);

		$("#Fio_otdel").bind("change",	function() {
							$("#Fio_tab").empty();
							$.post("/index.php/reestr/manauto",
								{id_org:$(this).val()},
								function(data){
									$.each(data, function(i,val) {  
										$("#Fio_tab").append("<option value="+val.id+">"+val.name+"</option>");
									});
								},
								"json"
							);
//							if ($("#Expo__msp").val()==758) {
//								$("#e830").show();
//alert($("#efact").is(":visible"));	
//							} else {
//								$("#e830").hide();
//							}
						}
				)
		;		
';
//$_SESSION['js'].=$js;
	Yii::app()->getClientScript()->registerCoreScript('jquery');
        $cs = Yii::app()->getClientScript();
	$cs->registerScript(__CLASS__.'#0', '$(document).ready(function(){'.$jsr.'});');
