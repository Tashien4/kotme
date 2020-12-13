<style>
/*div{text-align:center;}
.all{width:100%;text-align:center; position: relative;}*/
.btn{background:#D59F13;
padding:10px;
font-weight: bold;
font-size: 24px;
line-height: 28px;
text-align: center;
color: #6C461A;
border-radius:10px;}
a {text-decoration:none;cursor:pointer;}
p{text-indent: 1.5em;padding:10px;}
h4{font-size: 30px;
    font-weight: bold;
    padding:10px;text-align:center;}
.frame1 {background: #FFD4A4;
    width: 70%;
    font-size: 20px;
    left: 0;
    right: 0;
    margin: auto;
 }
pre {/*width: 70%;*/
    background:#252525;
    left: 0;
    right: 0;
    margin: auto; 
    color:white;
    padding:10px;
    border:1px solid #EF8000;}
</style>
<link rel="stylesheet" href="/kotme/www/highlight/styles/gruvbox-dark.css">
<script src="/kotme/www/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<div class="all">
<div class="frame1">
<?php $Parsedown = new Parsedown();
$filename = $_SERVER['DOCUMENT_ROOT']."/kotme/www/lessons/lesson".$id.".md";

$text=file_get_contents($filename);
    echo '<div style="padding: 20px;">'.$Parsedown->text($text).'</div>';?>
</div>
<br>
<br><Br>
<div style='text-align:center; position: relative;'>
<a href="exercise?n=<?php echo $id;?>" class="btn">Перейти к заданию</a>
</div>
</div>