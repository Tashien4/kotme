<?php
$this->pageTitle=Yii::app()->name . ' - Регистрации';
?>

<?php echo $this->renderPartial('_form', array(
			'model'=>$model,
			'bmodel'=>$bmodel,
//			'pmodel'=>$pmodel,
			'fmodel'=>$fmodel,
			'sp_prv'=>$sp_prv,

	)); 
?>