<?php $this->pageTitle=Yii::app()->name . ' - Login';?>
<style>
body {font-size:20px;}
input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */
.panel{
	width:35%;
	background-size: cover;
    position: fixed;
    top: 25%;
	left: 30%;
	background-image: url('/kotme/www/images/for_game/panel.png');
}
td{text-align:center;}
.inside{padding: 5% 10% 0 10%;font-size:20px;text-align: center;}
p{    color: yellow;
    font-size: 30px;
	text-shadow: 2px 2px #a97311;
	text-align:center;}
input{font-size:30px;padding: 2px;
    margin: 0px !important;}
.row_buttons{text-align: center;}
.btn:hover {
    background: #fcff35;
    box-shadow: 0 15px 20px rgb(229 122 46 / 40%);
    color: black;
    transform: translateY(-7px);
}
.btn{ 
	outline: none;
    display: inline-block;
    width: 140px;
    font-size: 15px;
    height: 45px;
    border-radius: 45px;
    text-transform: uppercase;
    text-align: center;
    font-weight: bold;
    color: #000000;
    background: #FFEB3B;
    box-shadow: 0 8px 15px rgba(0,0,0,.1);
    transition: .3s;}
a{    color: white !important;
    margin: 5px;
	text-align: left;
	cursor:pointer;}
	
#mainmenu{display:none;}
</style>
<div class="form">
<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="panel">
	<div class="inside">
		<br><p>Войдите для того, чтобы начались приключения</p>
		<div style="color: yellow;text-shadow: 2px 2px #a97311;">Нет аккаутна?
		<a href='<?php echo Yii::app()->baseUrl.'/index.php/site/newregistration'?>'>Зарегистрируйся</a></div><br>
		<?php echo $form->textField($model,'login',array('placeholder'=>'Логин','value'=>((isset($_GET['log'])?$_GET['log']:'')))); ?><br><br>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'Пароль')); ?><br><br>
		<br><?php echo $form->error($model,'password'); ?><br>
			<?php echo CHtml::submitButton('Войти',array('class'=>'btn','name'=>'log')); ?>
			<br><br>
</div>
</div>
<div style="position: fixed;
    right: 0px;
    width: 40%;
    top: 40%;
    left: 60%;
"> 
	<img src='/kotme/www/images/for_game/crab_hello.gif' width=80%/>
	</div>
<div style="position: fixed;
    left: 0px;
    width: 30%;
    top: 60%;"> 
	<img src='/kotme/www/images/for_game/crab_idle.gif' width=80%/>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<script>
function visible() {
 var a = document.getElementById("reg");
 var b = document.getElementById("reg2");
 if (a.style.display != "block")
    {a.style.display = 'block';b.style.display = 'block';}

 else {a.style.display = 'none';b.style.display = 'none';}
 

}

</script>
