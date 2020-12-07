<style>
#newfon{background-size: cover;    
  z-index: -2;}
  .cart {
        			background-image: url("/kotme/www/images/for_game/map/0.png");
        			background-size: contain;
        			background-repeat: no-repeat;
  				width:675px;
              			height:444px;
              			position: absolute;
        			left: 50%;
        			top: 47%;
    				text-align: center;
       				transform: translate(-50%, -50%);	
    			}
          	
          		.circle{
          			width: 35px;
              			height: 35px;
              			border-radius: 50%;
              			box-sizing: border-box;
              			
              			border-width:3px;
              			border-style: solid;
              			position: absolute;
          		}
          
          		#lev1{
            			display: block;
            			width:36px;
            			height: 36px;
            			top: 64%;
            			left: 30.5%;
          		}
          
          		#lev2{
            			display:block;
            			top: 54.1%;
            			left: 19%;
          		}
          
          		#lev3{
            			display:block;
            		
            			top: 39.4%;
            			left:18.8%;
          		}
          
          		#lev4{
            			width:31px;
            			height: 31px;
          			top: 28%;
            			left: 26%; 
          		}
          
          		#lev5{
            			width: 33px;
            			height: 33px;
          			top: 24.2%;
          			left: 40.3%;
          		}
          
          		#lev6{
            			width: 31px;
            			height: 31px;
          			top: 25.4%;
          			left: 51.8%;
          		}
          
           		#lev7{
            			width: 32px;
            			height: 32px;
          			top: 39.6%;
          			left: 41.8%;
          		}
          
          		#lev8{
            			width: 34px;
            			height: 34px;
          			top: 53.7%;
          			left: 49.6%;
          		}
          
          		#lev9{
          			top: 51%;
          			left: 60.4%;
         		}
          
          		#lev10{
            			width:36px;
            			height: 36px;
          			top: 48.8%;
            			left: 69.6%;
            			border-width:4px;
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

    div{text-align:center;}
    p{text-shadow: 2px 2px #a97311; color: #211603;    font-size: 30px;}
.char{    font-size: 20px;
    width: 80%;}
    </style>
<?php $form=$this->beginWidget('CActiveForm');
$pr=Yii::app()->user->isProgress()?>
<div class="cart">
<?php
  for($i=1;$i<11;$i++)
    echo '<div id="lev'.$i.'" class="circle" style="'.
          (($pr>=$i)?'background:rgba(95, 229, 11, 0.5);border-color:#5DB725;':
          ((($pr+1)==$i)?'background:rgba(236, 240, 13, 0.5);
          border-color:#ECF00D;':'display:none;')).'"
          onclick="window.location.href=\'/kotme/www/index.php/begin/lessons?id='.$i.'\'"
          ></div>';
      ?>
        </div>
<footer> 
  <div class="char">
  <?php echo $model->getCharacterText(Yii::app()->user->isProgressChar())?><br><br>
  <?php echo  CHtml::submitButton('>>>',array('class'=>'btn','name'=>'next'))?>
    </div>
    <div class="icon">
    <img id="character" src='/kotme/www/images/for_game/Character.png' width=75%/>
    </div>

</footer>
<?php $this->endWidget(); ?>