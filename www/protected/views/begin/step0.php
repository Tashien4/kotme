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
    width: 100%;
    position: fixed;
    top: 25%;
    text-align: center;
}
.menu{    position: fixed;
    top: 45%;
    left: 40%;
}

.inside{background-size: cover;
    text-align: center;
    position: fixed;
    top: 20%;
    border-radius: 50px;
    left: 40%;
    padding: 20px 40px;
    font-weight: bold;
    z-index: 2;
    -webkit-text-stroke: 3px #e7a321;
    background-image: url(/kotme/www/images/for_game/wood.jpg);
    color: yellow;
    font-size: 60px;
}
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
a{       color: #6C461A !important;
    line-height: 70px;
    text-align: center;
    cursor: pointer;
    font-size: 40px;
    font-weight: bold;
    text-decoration: none;}
	
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
?>
<div class="inside">KOTme</div>
<div class="panel"><img src='/kotme/www/images/for_game/menu.png' width=30%/></div>
<div class="panel"><br><br><br><br>
        <a href="<?php echo Yii::app()->baseUrl;?>/index.php/begin/cart">Играть</a><br>
        <a href="<?php echo Yii::app()->baseUrl;?>/index.php/begin/achivment">Достижения</a><br>
        <a href="<?php echo Yii::app()->baseUrl;?>/index.php/begin/legent">Легенда</a>
</div>
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
    <div style="position: fixed;
    left: 0px;
    width: 30%;
    top: 70%;"> 
	<img src='/kotme/www/images/for_game/angry.gif' width=80%/>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->

