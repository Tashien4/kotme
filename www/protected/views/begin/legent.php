<?php $this->pageTitle=Yii::app()->name . ' - Login';?>
<style>
    .flex{
          		display:flex;
              		align-items: center;
              		justify-content: center;
          	}

   .paper {
        background: url("/images/for_game/paper.png") no-repeat;
        background-size: contain;
        background-repeat: no-repeat;
        width:701px;
              		height:510px;
              		text-align: center;
              		margin-top:25px;
    }
    .text{ 
        font-size: 20px;
              		margin:auto;
              		margin-top:13%;
    			font-weight: normal;
    			line-height: 150%;   
                      width: 70%;
                      font-weight:bold;
       }
    #btn {margin:10px;}
    #btn a{
    text-decoration: none;
    cursor: pointer;
    padding: 10px 20px;
    font-weight: bold;
    border-radius: 5px; 
    background: #D59F13;
    color: white;}
</style>
<div class="flex">
    <div class="paper">
        
        <div class="text">
        Поиски древних сокровищ всегда интересовали
         авантюристов всех мастей, с тех самых пор,
         как эти сокровища укрывали - с глубокой древности.
          Путешественник отправляется на остров для 
          поиска древнего клада. Помоги путешественнику
           расшифровать карту и найти сокровища. 
           Двигайся по карте острова, решая задачи по Kotlin,
           ищи подсказки и доберись до сокровищ.
         </div> <br><Br> 
	    <div id="btn"><a href="/index.php/begin/cart">Далее</a></div>
    </div>	
</div>
