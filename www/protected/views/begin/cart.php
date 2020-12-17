<style>
#newfon{background-size: cover;    
  z-index: -2;}
  .cart {
   background-image: url("/images/for_game/map/0.png");
   background-size: contain;
   background-repeat: no-repeat;
	width: 750px;
    height: 550px;
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
              			border:1px solid black;
              			border-width:3px;
              			border-style: solid;
              			position: absolute;
          		}
          
          		#lev1{
            			display: block;
            			width:36px;
            			height: 36px;
            			top: 58%;
            			left: 31%;
          		}
          
          		#lev2{
            			display:block;
            			top: 49.1%;
            			left: 19%;
          		}
          
          		#lev3{
            			display:block;
						top: 35.4%;
    					left: 19%;
          		}
          
          		#lev4{
            			width:31px;
            			height: 31px;
						top: 26%;
   						left: 26.3%; 
          		}
          
          		#lev5{
            			width: 33px;
            			height: 33px;
						top: 22.2%;
    					left: 40.5%;
          		}
          
          		#lev6{
            			width: 31px;
            			height: 31px;
						top: 23.4%;
   						left: 52%;
          		}
          
           		#lev7{
            			width: 32px;
            			height: 32px;
						top: 35.6%;
    					left: 42%;
          		}
          
          		#lev8{
            			width: 34px;
            			height: 34px;
						top: 48.7%;
    					left: 50%;
          		}
          
          		#lev9{
					top: 46%;
    				left: 60.7%;
         		}
          
          		#lev10{
            			width:36px;
            			height: 36px;
          			top: 43.8%;
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
    width: 80%;    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    justify-content: center;
    align-items:center;
    align-content: stretch;
	
	}
	.btn{text-decoration: none;
    cursor: pointer;
    padding: 10px;
    font-weight: bold;
    border-radius: 5px;
	width:50px;}
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
          onclick="window.location.href=\'/index.php/begin/lessons?id='.$i.'\'"
          ></div>';
      ?>
        </div>
<footer> 
  <div class="char">
  <?php echo $model->getCharacterText(Yii::app()->user->isProgressChar())?><br><br>
  <?php echo  CHtml::submitButton('>>>',array('class'=>'btn','name'=>'next'))?>
    </div>
    <div class="icon">
    <img id="character" src='/images/for_game/Character.png' width=50%/>
    </div>

</footer>
<?php $this->endWidget(); ?>