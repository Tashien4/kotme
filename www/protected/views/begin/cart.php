<style>
#newfon{background-size: cover;    z-index: -2;}
.char{font-size: 20px;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    margin: 0px;
    width: 100%;
     }
footer{  display:flex;
  width: 100%;
    position: fixed; 
    background: #EEC047;
    border: 10px outset #FFDC82;
    left: 0; bottom: 0;}
   
    #character{
      border-radius:100px;
      border:10px solid #FFDC82;
      background: #F8A446;}
.text{text-align:center;
  width:60%;
	position: fixed;
    top: 60%;
    left: 50%;   
    height:300px;
      -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    div{text-align:center;}
    p{text-shadow: 2px 2px #a97311; color: #211603;    font-size: 30px;}

    </style>
<?php $form=$this->beginWidget('CActiveForm');?>
    <div>
    <img src='/kotme/www/images/for_game/map/0.png' />
    </div>
<footer> 
  <div class="char">
  <?php echo $model->getCharacterText(Yii::app()->user->isProgressChar())?><br><br>
  <?php echo  CHtml::submitButton('>>>',array('class'=>'btn','name'=>'next'))?>
    </div>
    <div class="icon">
    <img id="character" src='/kotme/www/images/for_game/Character.png' width=75% />
    </div>

</footer>
<?php $this->endWidget(); ?>