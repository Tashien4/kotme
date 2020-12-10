<style>
    body {
        font-size:20px;
        background-size: cover;
        position: relative;
        background-image: url('/kotme/www/images/for_game/fon.png');
    }

    label, textarea, button {
        display: block;
    }
    label {
        /*white-space: pre-wrap;*/
        padding: 20px 0;
    }
    #status {
        /*white-space: pre-wrap;*/
        padding: 20px !important;
        border: 1px solid black;
        background: #DCDCDC;
        margin: 5px;
    }
    #desc{
        width:100%;
        position: relative;}
    .text, .task {
        width: 90%;
        font-size: 20px;
        text-align: center;
        left: 0;
        right: 0;
        margin: auto;
        border: 2px solid #EF8000;}
    .text{  
        background: #FFDC82;
        display:flex;
        
    }
    .task{
        background: #FFD4A4;
    }
    .btn {
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

    .btn:hover {
        background: #fcff35;
        box-shadow: 0 15px 20px rgb(229 122 46 / 40%);
        color: black;
        transform: translateY(-7px);
    }

    textarea {
        width: 800px;
        height: 200px;
        background-color: black;
        color: white;
    }
    img{
        width:10%;
        background: #F8A446;
        border-radius: 130px 117px 0px 0px;
    }

</style>
<?php $form = $this->beginWidget('CActiveForm'); ?>
<?php $exeNum = $_GET["n"];
echo '<a href="lessons?id=' . $exeNum . '" class="btn" style="font-size: 15px !important;">Вернуться к лекции</a><br>';
?>
<link rel="stylesheet" href="/kotme/www/codemirror/codemirror.css">
<link rel="stylesheet" href="/kotme/www/codemirror/darcula.css">
<link rel="stylesheet" href="/kotme/www/css/modal.css">
<script src="/kotme/www/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/kotme/www/js/modal.js"></script>
<script type="text/javascript" src="/kotme/www/codemirror/codemirror.js"></script>
<script type="text/javascript" src="/kotme/www/codemirror/clike.js"></script>
<script type="text/javascript" src="/kotme/www/js/exercise.js"></script>

<?php
if ($exeNum != NULL) {
    echo "<label id=\"desc\">";
    $text = $model->giveMeLesson($exeNum);
    echo '<div class="text">
                <div style="width: 100%;"><br>' . $text['text'] . '</div>
                <img src="/kotme/www/images/for_game/icon.png"/>
         </div>
         <div class="task">
            <h4>Задание ' . $exeNum . '</h4>
            ' . $text['task'] . '
        </div>';
    // echo file_get_contents("protected/exercises/desc" . $exeNum, false, NULL);
    echo "</label>";

    echo "<textarea id=\"code\">";
    $code = $model->getMyAnswer($exeNum);
    if (strlen($code) > 0) {
        echo $code;
    } else {
        echo file_get_contents("protected/exercises/code" . $exeNum, false, NULL);
    }
    echo "</textarea>";
} else {
    echo "Номер задачи не указан";
}
?>
<div style="text-align:center;">
    <button id="submit" class="btn">Отправить</button>
    <label id="status"></label>
    <?php echo '<a class="btn" id="nextstep" 
        style="display:none;" href="cart">Далее</a>'; ?>

</div>
<?php $this->endWidget(); ?>
<script>
    $(document).ready(function () {
        $('#status').bind('DOMSubtreeModified', function () {
            var txt = $('#status').text();
            if (txt == "Отличное начало. Продолжай в том же духе!") {
                document.getElementById("nextstep").style.display = "inline-block";
                showMod();

            }
            ;
        });
    });
</script>
<script>
    function showMod() {
        // создаём модальное окно
        var modal = $modal();
        modal.show();
    }
    ;
</script>