
<style>
body{background-size: cover;
	position: relative;
background-image: url('/kotme/www/images/for_game/fon_2.jpg');}

.text{text-align:center;width:60%;
	position: fixed;
    top: 60%;
    left: 50%;   
    height:300px;
      -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    p{text-shadow: 2px 2px #a97311; color: #211603;    font-size: 30px;}

    </style>
    <div class="newfon">
        <img src='/kotme/www/images/for_game/map3.png' width=60% />
        <div class="text"><?php echo $model->getCharacterText(Yii::app()->user->isProgressChar())?></p>
          <!--a href='<?php echo Yii::app()->baseUrl.'/index.php/begin/cart';?>'">Далее</a-->
</div></div>
    </div>
    