<div class="wide form">
</div><!-- search-form -->  <?php $form=$this->beginWidget('CActiveForm'); ?>

	<div class="row">
		<?php $this->widget('CAutoComplete',
			    array(
			        'model'=>'fio',
			        'name'=>'Fio[newtab]',
  			        'value'=>$fmodel->tab,
//			        'ajaxUpdate'=>true,
			        'url'=>array('/reestr/fioautocompletefull'),
			        'minChars'=>2,
			        'htmlOptions'=>array(
//			           'style'=>'height:10px;',
			           'size'=>'70',
				   'onchange'=>'submit();'
		         	),
			    )
			); 
		?>
	</div>

	<?php echo CHtml::errorSummary($model); ?>
         <table >
	
       		<tr bgcolor="#f8eff1">
			<td>
				<?php echo $form->Label($fmodel,'org'); ?><br>
				<?php echo $form->DropDownList($fmodel,'otdel',Fio::listOrg()); ?>
				<?php echo $form->hiddenField($fmodel,'hfio'); ?>
			</td>
			<td>
				<?php echo $form->Label($fmodel,'fio'); ?><br>
				<?php //echo $form->DropDownList($model,'tab',$model->listAllfio($model->otdel,$onlylive=1),array('ondblclick'=>'var hf=document.getElementById("Fio_hfio");  hf.value=1;submit();')); ?>
				<?php //echo $form->DropDownList($model,'tab',$model->listAllfio($model->otdel,$onlylive=1),array('onclick'=>'var hf=document.getElementById("Fio_hfio");  hf.value=1;submit();')); ?>
				<?php echo $form->DropDownList($fmodel,'tab',Fio::listAllfio($fmodel->otdel,$onlylive=1),array('onchange'=>'var hf=document.getElementById("Fio_hfio");  hf.value=1;submit();')); ?>
			</td>
			<td>
				<!--img title="Добавить устройство" src="/images/rte-link-button.png" onclick='var idd=document.getElementById("newdevice"); if(idd.style.display=="none"){  idd.style.display = "block"; } else{ idd.style.display = "none";}'/-->
			</td>
			<td><img title="Карточка учета" src="/images/b_print.png" onclick="return location.href = '/index.php/reestr/form/<?php echo $model->id;?>'"/></td>
		</tr>
		<tr bgcolor="#fcf9e8">
				<?php $adr=$fmodel->sp_adr($fmodel['zdan']);
				echo '<td colspan=4 align=center><a href="/index.php/reestr/adres/'.$model->id.'">Адрес: '.$adr['adres'].', этаж '.$fmodel->etag.' '.(($fmodel->kab>0)?(',каб.№ '.$fmodel->kab):'').'</a>';?>
				</td>
		<tr>
			<td colspan='4' style="background-color:#daeefe;">
				<span id="newdevice" style="display:none;">Новое устройство: 
					<?php //echo $form->DropDownList($model,'newdevice',$adddevice,array('ondblclick'=>'var hf=document.getElementById("Fio_hfio");var idd=document.getElementById("Fio_newdevice"); hf.value=1;  submit();'));?>
					<?php //echo $form->DropDownList($model,'newdevice',$adddevice);?>
                                   	<?php echo CHtml::submitButton('Добавить',array('name'=>'Fio_button')); ?>
				</span>
			</td>

		</tr>
</table> <br>
 
 <?php $this->endWidget(); ?>
