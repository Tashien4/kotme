
<style>
body{background-size: cover;
	position: relative;
background-image: url('/kotme/www/images/for_game/fon_3.jpg');}
#newfon{background-size: cover;    z-index: -2;}
.char{font-size: 20px;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    margin: 0px;
    width: 100%;
   }
footer{  display:flex;
   background: #f7c306;
    border: 10px outset #ffd765; position: fixed; /* Фиксированное положение */
    left: 0; bottom: 0;}
   
    #character{border-radius:100px;border:10px solid yellow; background: #eccf3c;}
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
<footer> 
  <div class="char">
  <?php echo $model->getCharacterText(Yii::app()->user->isProgressChar())?><br><br>
  <a href="task">>>></a>
    </div><div class="icon">
    <img id="character" src='/kotme/www/images/for_game/Character.png' width=75% />
    </div>

</footer>