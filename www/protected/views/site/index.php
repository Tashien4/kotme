
 
  <?php 
$form=beginWidget('CActiveForm'); ?>

	<?php if (isset($model)) echo CHtml::errorSummary($model); ?>

         <table >
	
       		<tr bgcolor="#f8eff1">
			<td>
				<?php echo $form->Label($model,'org'); ?><br>
				<?php echo $form->DropDownList($model,'otdel',$model->listOrg()); ?>
				<?php echo $form->hiddenField($model,'hfio'); ?>
			</td>
			<td>
				<?php echo $form->Label($model,'fio'); ?><br>
				<?php echo $form->DropDownList($model,'tab',
					$model->listAllfio($model->otdel,$onlylive=1),
					array('onchange'=>'var hf=document.getElementById("Fio_hfio");  hf.value=1;submit();')
				  ); ?>
			</td>
			<td>
				<img title="Добавить устройство" src="/images/rte-link-button.png" onclick='var idd=document.getElementById("newdevice"); if(idd.style.display=="none"){  idd.style.display = "block"; } else{ idd.style.display = "none";}'/>
			</td>
			<td><img title="Карточка учета" src="/images/b_print.png" onclick="return location.href = '/index.php/reestr/form/<?php echo $model->tab;?>'"/></td>
		</tr>
		<tr bgcolor="#fcf9e8">
				<?php $adr=$model->sp_adr($model['zdan']);
				echo '<td colspan=4 align=center><a href="/index.php/reestr/adres/'.$model->tab.'">Адрес: '.$adr['adres'].', этаж '.$model->etag.' '.(($model->kab>0)?(',каб.№ '.$model->kab):'').'</a>';?>
				</td>
		<tr>
			<td colspan='4' style="background-color:#daeefe;">
				<span id="newdevice" style="display:none;">Новое устройство: 
					<?php //echo $form->DropDownList($model,'newdevice',$adddevice,array('ondblclick'=>'var hf=document.getElementById("Fio_hfio");var idd=document.getElementById("Fio_newdevice"); hf.value=1;  submit();'));?>
					<?php echo $form->DropDownList($model,'newdevice',$adddevice);?>
                                   	<?php echo CHtml::submitButton('Добавить',array('name'=>'Fio_button')); ?>
				</span>
			</td>

		</tr>
</table> <br>
 
	 <?php 

$this->endWidget(); ?>
<div align=right>

 </div>
  <?php 
foreach($pmodel as $pc) {
	$aprop=Pc::getTables($pc->type);
		$this->renderPartial('_viewPc', array('model'=>$pc));	
}
?>
<?php
	$atype=Pc::listType();
	$acolor=array('1'=>'#c1dee2', 
		'2'=>'#89b9c5',     
		'3'=>'#8fa4c3',       
		'4'=>'#5ba5c2',     
		'5'=>'#628ca6',    
		'6'=>'#417d95',
		'7'=>'#586c91',	);

	if(isset($model->activepannel)){
	        Yii::app()->clientScript->registerScript('setTab',"$(\"#accordion\").accordion( \"option\", \"active\",$model->activepannel);",CClientScript::POS_READY);}
$apanel=array();
 
/*$apanel[('Общие сведения')]=
		$this->renderPartial('list0', array('model'=>$model),true); */
foreach($pmodel as $pc) {
	$aprop=Pc::getTables($pc->type);
  
//	$hmodel=Hdd::model()->findAllByAttributes(array('id_pc'=>$pc->id)); 
	$apanel[$pc->inv_nom][((($aprop['img'])?('<img height="35" width="35" style="border-radius: 30px;" alt="'.$pc->id.'" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b> '.$pc->name.(($pc->prim)?('<span style="font-size:0.7em;">'.$pc->prim.'</span>'):'').'<b style="background-color:'.(($pc->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>')]=
		$this->renderPartial('_listPc', array('model'=>$pc),true);
//	$inv_nomPc=($pc->inv_nom);

}
foreach($mmodel as $moduls) { 		
//	if (($moduls->inv_nom)==$inv_nomPc) { $col='red';}else{$col='black';};
	$aprop=Pc::getTables($moduls->type);
	$mprop=Moduls::getTables($moduls->type);
	
	$apanel[$moduls->inv_nom][((($aprop['img'])?('<img height="35" width="35" alt="'.$moduls->id.'"style="border-radius: 30px;" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b>  Слот '.$moduls->slot.' '.$moduls->name.(($moduls->prim)?('<span style="font-size:0.7em;">'.$moduls->prim.'</span>'):'').'<b style="background-color:'.(($moduls->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>
	<br>' 
			)]= 
			$this->renderPartial('_listModuls', array('model'=>$moduls),true);
} 

foreach($hmodel as $HDD) {
	$aprop=Pc::getTables($HDD->type);
	$apanel[$HDD->inv_nom][((($aprop['img'])?('<img  height="35" width="35"  style="border-radius: 30px;" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b> '.$HDD->id.' Слот '.$HDD->slot.' '.$HDD->name.(($HDD->prim)?('<span style="font-size:0.7em;">'.$HDD->prim.'</span>'):'').'<b style="background-color:'.(($HDD->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>')]= 
		$this->renderPartial('_listHDD', array('model'=>$HDD),true);
}
foreach($monmodel as $monitors) {
	$aprop=Pc::getTables($monitors->type);
	$apanel[$monitors->inv_nom][((($aprop['img'])?('<img  height="35" width="35"  alt="'.$monitors->id.'" style="border-radius: 30px;" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b> '.$monitors->name.(($monitors->prim)?('<span style="font-size:0.7em;">'.$monitors->prim.'</span>'):'').'<b style="background-color:'.(($monitors->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>')]=
		$this->renderPartial('_listMonitors', array('model'=>$monitors),true);
}
foreach($ptmodel as $print) {
	$aprop=Pc::getTables($print->type);
	$apanel[$print->inv_nom][((($aprop['img'])?('<img  height="35" width="35" alt="'.$print->id.'"style="border-radius: 30px;" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b>  '.$print->name.(($print->prim)?('<span style="font-size:0.7em;">'.$print->prim.'</span>'):'').'<b style="background-color:'.(($print->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>')]= 
		$this->renderPartial('_listPrinter', array('model'=>$print),true);
}
foreach($prmodel as $proch) {

	$aprop=Pc::getTables($proch->type);
	 $apanel[$proch->inv_nom][((($aprop['img'])?('<img  height="35" width="35" alt="'.$proch->id.'"style="border-radius: 30px;" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b> ' .$proch->name.(($proch->prim)?('<span style="font-size:0.7em;">'.$proch->prim.'</span>'):'').'<b style="background-color:'.(($proch->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>')]= 
		$this->renderPartial('_listProch', array('model'=>$proch),true);

}

//echo '===='.count($netmodel);
foreach($netmodel as $netcard) {
//print_r($netcard);
	$aprop=Pc::getTables($netcard->type);
	 $apanel[$netcard->inv_nom][((($aprop['img'])?('<img  height="35" width="35"  alt="'.$netcard->id.'"style="border-radius: 30px;" border="5" bordercolor="#'.(($aprop['color'])?$aprop['color']:'egf').'" src="/'.$aprop['img'].'" />'):'').'<b>'.$aprop['name'].'</b> ' .$netcard->name.(($netcard->prim)?('<span style="font-size:0.7em;">'.$netcard->prim.'</span>'):'').'<b style="background-color:'.(($netcard->prov<1)?("Red"):("green")).';position: absolute;right:10px; top: 20px;">&#8195</b>')]= 
		$this->renderPartial('_listNetcard', array('model'=>$netcard),true);

}   
   
$i=0;
foreach($apanel as $inv=>$ap) {
$i=$i%7;
//$rmodel=Reestr::model;
 echo '<div style="background-color:'.$acolor[++$i].'; border:8px groove #2d626c;">
	<br><b style="font-size:15px; color:Black;border-radius: 8px;">&#8195 Инвентарный номер '.$inv.'<br></b>
	<br>';
  $this->widget('zii.widgets.jui.CJuiAccordion', 	array(
	'panels'=>$ap,
	'options'=>array(
        	'animated'=>'bounceslide',
		'active'=>'0'
      	),
//	'clientOptions' => array('collapsible' => true, 'active' => false),
  )); 
 echo '</div><br>';
}

/*
$js='';
        Yii::app()->getClientScript()->registerCoreScript('jquery');
        $cs = Yii::app()->getClientScript();
	$cs->registerScript(__CLASS__.'#0', '$(document).ready(function(){'.$js.'});');
*/
//$this->endWidget(); 

?>



<?php  	
$jsr='
//		$("#Fio_tab").empty();
//			$.post("/index.php/reestr/manauto",
//				{id_org:'.$model->otdel.'},
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
										$("#Fio_tab").append("<option value="+val.id+">"
										+val.name+"</option>");
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
?>

 
