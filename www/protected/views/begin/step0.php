<?php $this->pageTitle = Yii::app()->name . ' - Login'; ?>
<style>
    body {
        font-size:20px;
        background-size: cover;
        background-image: url('/images/for_game/b_3.png');
    }

    input:focus::-webkit-input-placeholder { color:transparent; }
    input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
    input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
    input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */

    .menu{    position: fixed;
              top: 45%;
              left: 40%;
    }

    .menu-container {
        background-image: url("/images/for_game/menu.png");
        background-size: contain;
        background-repeat: no-repeat;
        padding: 50px;

        margin: 0;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%)
    }

    .inside {
        margin-top: -100px;
        background-size: cover;
        text-align: center;
        border-radius: 50px;
        left: 40%;
        padding: 20px 40px;
        font-weight: bold;
        z-index: 2;
        -webkit-text-stroke: 3px #e7a321;
        background-image: url(/images/for_game/wood.jpg);
        color: yellow;
        font-size: 60px;
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
        margin: 0px !important;
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
    
    a {       color: #6C461A !important;
              line-height: 70px;
              text-align: center;
              cursor: pointer;
              font-size: 40px;
              font-weight: bold;
              text-decoration: none;
    }

	
    #mainmenu{display:none;}
    div#mainmenu{display:none;}
</style>

    <div class="menu-container">
        <div class="inside">KOTme</div>
        <div class="panel"><br><br><br><br>
            <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/begin/cart">Играть</a><br>
            <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/begin/achivment">Достижения</a><br>
            <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/begin/legent">Легенда</a>
        </div>
    </div>
    <div style="position: fixed;
         right: 0px;
         width: 30%;
         top: 70%;
         left: 60%;
         "> 
        <img src='/images/for_game/crab_hello.gif' width=80%/>
    </div>
    <div style="position: fixed;
         left: 0px;
         width: 30%;
         top: 70%;"> 
        <img src='/images/for_game/crab_idle.gif' width=80%/>
    </div>
    <div style="position: fixed;
         left: 70%;top:25%"> 
        <img src='/images/for_game/angry.gif' width=80%/>
    </div>


