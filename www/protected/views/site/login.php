<?php $this->pageTitle=Yii::app()->name . ' - Login';?>
<style>
body {font-size:20px;
    background-size: cover;
background-image: url('/kotme/www/images/for_game/b_3.png');}
input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */
.panel{
    width: 40%;
    position: fixed;
    top: 20%;
    text-align: center;
    left: 30%;
}
.menu{    position: fixed;
    top: 45%;
    left: 40%;
    text-align: center;
}}
td{text-align:center;}
.inside{
    text-align: center;
    position: fixed;
    top: 20%;
    border-radius: 100px;
    left: 40%;
    padding: 20px 40px;
    
    z-index: 2;
   
}
p{    color: yellow;
    font-size: 30px;
	text-shadow: 2px 2px #a97311;
	text-align:center;}
input{font-size:30px;padding: 2px;
    }
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
)); 

$idd=(($id>0)?$id:0);?>

	<div class="panel"><img src='/kotme/www/images/for_game/panel.png' width=80%/></div>
    <div class="panel"><br>
        <b style=" -webkit-text-stroke: 3px #e7a321;
                    color: yellow;
                    font-size: 60px;
                    font-weight: bold;">KOTme</b><br>
    <?php if($idd==0) echo'
		<BR><b style="color: yellow;text-shadow: 2px 2px #a97311;">Нет аккаутна?
		<a href="'.Yii::app()->baseUrl.'/index.php/site/newregistration">
        Зарегистрируйся</a></b><br><BR>'.
        $form->textField($model,'login',array('placeholder'=>'Логин','value'=>((isset($_GET['log'])?$_GET['log']:'')))).'
		'.$form->passwordField($model,'password',array('placeholder'=>'Пароль')).'<br>
		'.$form->error($model,'password').'
		'.CHtml::submitButton('Войти',array('class'=>'btn','name'=>'log')).'
			<br>

</div>';
else echo '<p style="margin:0px;">Регистрация</p>
'.$form->textField($model,'login',array('placeholder'=>'Логин')).
$form->textField($model,'name',array('placeholder'=>'Имя')).
$form->passwordField($model,'password',array('placeholder'=>'Пароль')).'
<br>'.
CHtml::submitButton('Отправить',array('class'=>'btn')).'

<a href="'.Yii::app()->baseUrl.'/index.php/site/login">Назад</a>';?>
<div style="position: fixed;
    right: 0px;
    width: 30%;
    top: 70%;
    left: 60%;
"> 
	<img src='/kotme/www/images/for_game/crab_hello.gif' width=80%/>
	</div>
<div style="position: fixed;
    left: 0px;
    width: 30%;
    top: 70%;"> 
	<img src='/kotme/www/images/for_game/crab_idle.gif' width=80%/>
	</div>
    <div style="
        position: fixed;
    right: 0Px;
    top: 20%;"> 
	<img src='/kotme/www/images/for_game/hello.gif' width=150%/>
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
