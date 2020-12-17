<style>body {font-size:20px;}
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
	background-image: url('/images/for_game/panel.png');
}
td{text-align:center;}
.inside{padding: 5% 10% 0 10%;font-size:20px;text-align: center;}
p{    color: yellow;
    font-size: 30px;
	text-shadow: 2px 2px #a97311;
}
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
    width: 200px;
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
	cursor:pointer;}</style>

<div class="form">
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form-registration-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="panel">
	<div class="inside">
	<br><p>Регистрация</p>
		<?php echo $form->textField($model,'login',array('placeholder'=>'Логин')); ?>
		<?php echo $form->textField($model,'name',array('placeholder'=>'Имя')); ?>
		<?php echo $form->textField($model,'email',array('placeholder'=>'Email')); ?>
		<?php echo $form->error($model,'email'); ?>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'Пароль')); ?>
		<br><br>

		<?php echo CHtml::submitButton('Отправить',array('class'=>'btn')); ?>
	<br><br>
	</div>
</div>
<?php $this->endWidget(); ?>
 
</div><!-- form -->