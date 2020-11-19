<?php $this->pageTitle=Yii::app()->name . ' - Login';?>
<style>
      body {
        font-size:20px;
        background-size: cover;
        background-image: url('/kotme/www/images/for_game/b_3.png');
    }

    input:focus::-webkit-input-placeholder { color:transparent; }
    input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
    input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
    input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */

    .errorMessage{color:red;}

    .menu{    position: fixed;
              top: 45%;
              left: 40%;
    }

    .menu-container {
        background-image: url("/kotme/www/images/for_game/panel.png");
        background-size: contain;
        background-repeat: no-repeat;
        width: min-content;
        padding: 50px 0px;
        margin: 0;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%)
    }

    .inside {
       /* margin-top: -100px;*/
        text-align: center;
        left: 40%;
        padding: 20px 40px;
        font-weight: bold;
        z-index: 2;
        /*-webkit-text-stroke: 3px #e7a321;
        color: yellow;
        font-size: 60px;*/
    }

    .panel {
        margin-top: -60px;
        text-align: center;
    }

    p {
        color: yellow;
        font-size: 30px;
        text-shadow: 2px 2px #a97311;
        text-align:center;
    }

    input {
        font-size:30px;padding: 2px;
        margin: 10px !important;
    }

    .row_buttons {
        text-align: center;
    }

    .btn:hover {
        background: #fcff35;
        box-shadow: 0 15px 20px rgb(229 122 46 / 40%);
        color: black;
        transform: translateY(-7px);
    }

    .btn {
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
        transition: .3s;
    }
    
    a {     
        color: white !important;
        margin: 5px;
	    text-align: left;
        cursor:pointer;
        text-decoration:none;
    }

	
    #mainmenu{display:none;}
    div#mainmenu{display:none;}
</style>

<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
));?>
   <div class="menu-container">
        <div class="inside">
            <b style=" -webkit-text-stroke: 3px #e7a321;
                color: yellow;
                font-size: 60px;
                font-weight: bold;">
            KOTme</b>
       
        <?php 
        if($id==0) echo'<BR><b style="color: yellow;text-shadow: 2px 2px #a97311;">Нет аккаутна?
                <a href="'.Yii::app()->baseUrl.'/index.php/site/newregistration">
                Зарегистрируйся</a></b><br><BR>'.
                $form->textField($model,'login',array('placeholder'=>'Логин','value'=>((isset($_GET['log'])?$_GET['log']:'')))).'
		        '.$form->passwordField($model,'password',array('placeholder'=>'Пароль')).'<br>
		        '.$form->error($model,'password').'
		        '.CHtml::submitButton('Войти',array('class'=>'btn','name'=>'log')).'
		        <br>';
        else echo '<p style="margin:0px;">Регистрация</p>
                '.$form->textField($model,'login',array('placeholder'=>'Логин')).
                $form->textField($model,'name',array('placeholder'=>'Имя')).
                $form->passwordField($model,'password',array('placeholder'=>'Пароль')).'
                <br>'.
                CHtml::submitButton('Отправить',array('class'=>'btn')).'
                <a href="'.Yii::app()->baseUrl.'/index.php/site/login">Назад</a>';?>
         </div>	
    </div>
<div style="position: fixed; width: 30%; top: 70%;left: 60%;"> 
	<img src='/kotme/www/images/for_game/crab_hello.gif' width=80%/>
</div>
<div style="position: fixed;left: 0px;width: 30%;top: 70%;"> 
	<img src='/kotme/www/images/for_game/crab_idle.gif' width=80%/>
</div>
<div style="position: fixed;left: 50%; z-index:-2;"> 
	<img src='/kotme/www/images/for_game/idle.gif' />
</div>

<?php $this->endWidget(); ?>
