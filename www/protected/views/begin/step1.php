
<style>

.paper{	background-size: 100%; 
   text-align:center;
   background-size: 100%; 
    background-image: url('/images/for_game/paper.png');
    position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;}
#mainmenu{display:none;}
.text{text-align:center;width:60%;
 
	position: fixed; /* or absolute */
    top: 50%;
    left: 50%;   
    height:300px;
      -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    p{text-shadow: 2px 2px #a97311; color: #211603;    font-size: 30px;}
    a {
  text-decoration: none;
  outline: none;
  display: inline-block;
  width: 200px;
    height: 60px;
    line-height: 60px;
    border-radius: 45px;
    margin: 10px 20px;
    font-size: 20px;
  text-transform: uppercase;
  text-align: center;
  font-weight: bold;
  color: black;
  background: #FFEB3B;
  box-shadow: 0 8px 15px rgba(0,0,0,.1);
  transition: .3s;
}
a:hover {
    background: #fcff35;
    box-shadow: 0 15px 20px rgb(229 122 46 / 40%);
    color: black;
    transform: translateY(-7px);
}
    </style>
    <div class="newfon">
        <div class="paper">
        <div class="text"><p>Поиски древних сокровищ всегда интересовали авантюристов всех мастей, 
        с тех самых пор, как эти сокровища укрывали - с глубокой древности.
         Путешественник отправляется на остров для поиска древнего клада.
          Помоги путешественнику расшифровать карту и найти сокровища. 
          Двигайся по карте острова, решая задачи по Kotlin, ищи подсказки и доберись первым до сокровищ.</p>
          <a href='<?php echo Yii::app()->baseUrl.'/index.php/begin/cart';?>'">Далее</a>
</div></div>
    </div>