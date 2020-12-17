<style>
   .flex{
   display:flex;
   align-items: center;
   justify-content: center;
    }
	.paper {
        		background-image: url("/images/for_game/paper.png");
        		background-size: contain;
        		background-repeat: no-repeat;
  			width:701px;
              		height:510px;
              		text-align: center;	
              		margin-top:25px; 
    		}
          
    		.cont{ 
              		display:flex;
              		justify-content: space-around;
              		align-items: center;
    			font-size: 20px;
    			font-weight: normal;
    			line-height: 150%;   
              		width: 80%;
       		}
          
          	img{
              		display:block;
              		width:125px;
          	}
          
          	.achiev{
          		/*width: 320px;
              		height:240px;*/
              		background-color: #D3A46E;
              		border: 2px solid #F8A446;
              		display:flex;
              		flex-wrap: wrap;
              		justify-content: center;
          	}
          
          	.level{
          		width:45px;
              	height:45px;
              	background-color:#C4C4C4;
				margin: 15px;
				border: 5px solid #784d1c;
				cursor:pointer
			  }
			.level:hover{
				border: 5px solid #ffdfba;
          	}
          
          	h1{
              		color: #6C461A;
              		font-size: 22px;
              		margin-top: 12%;
          	}
          
          	#done{
			background-color: #5FE50B;        
          	}
          
          	#nope{
				background-image: url("/images/for_game/question.png");
          	}
          
    		#btn { 
              		width:123px;
              		border-radius: 5px; 
    			background: #D59F13;
          		text-align:center;
          		cursor: pointer;
    			font-weight: bold;
    			font-size:18px;
              		padding:10px;
              		margin: auto;
              		margin-top: 30px;
              		border: 2px solid #F8A446;
    		}
      
    		#btn a{
    			text-decoration: none;
              		color: #6C461A; 
              	
			}

	.char{font-size: 20px;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    margin: 0px;
    width: 100%;
     }
		</style>
<?php $m=$model->giveMeAllAch();
							$text=array();
							$name=array();
							$out=' ';
							$cou=0;
						foreach($m as $ach) {
							array_push($text,$ach['prim']);
							array_push($name,$ach['name']);
							$idd=(($model->My_Ach($ach['id'])==1)?' id="done" ':'');
							$cou+=(($model->My_Ach($ach['id'])==1)?1:0);
							$out.='<div onclick="showMore('.$ach['id'].')" class="level" 
							'.$idd.' title="'.$ach['name'].'">
							'.(($model->My_Ach($ach['id'])==0)?'<img style="width: 70%;
							padding: 0 15%;" src="/images/for_game/question.png"/>':'').'</div>';
						}
					?>
      <div class="flex">
    	<div class="paper"><bR><bR><bR><bR><bR><bR>
        	<h1>Ваши достижения: <?php echo $cou."/".count($m);  ?></h1>
        	<div class="cont">
          		<img style="width: 40%;" src="/images/for_game/dance_2.gif">
          		<div class="achiev">
					<?php echo $out;?>
          			
				<div class="char" id="char"></div>

          		</div>
      		</div>
      		<div id="btn"><a href="/index.php/begin/cart">Продолжить</a></div>
        </div>
	   </div>
<footer style="display:none;" id="foo">
	<div class="char" id="char">
	</div>
</footer>
	   <script>
		   var text=new Array();
		   var nameA=new Array();
		   text=<?php echo json_encode($text)?>;
		   nameA=<?php echo json_encode($name)?>;
		   function showMore(n){
			   var f=document.getElementById("foo");
			   var c=document.getElementById("char");
			   if(f.style.display=="none") f.style.display="flex";
			   c.innerHTML= '"'+nameA[n-1]+'"<br>'+text[n-1];
			}
	   </script>
