<style>
div{text-align:center;}
.all{width:100%;text-align:center; position: relative;}
.btn{background:#D59F13;
padding:10px;
font-weight: bold;
font-size: 24px;
line-height: 28px;
text-align: center;
color: #6C461A;
border-radius:10px;}
a {text-decoration:none;cursor:pointer;}
h4{font-size: 30px;
    font-weight: bold;
    padding:10px;}
.frame1 {background: #FFD4A4;
    width: 70%;
    font-size: 20px;
    text-align: center;
    left: 0;
    right: 0;
    margin: auto;
 }
.frame2 {width: 70%;
    background:#252525;
    left: 0;
    right: 0;
    margin: auto; 
    color:white;
    padding:10px;
    border:1px solid #EF8000;}
</style>

<div class="all">
<div class="frame1">
<?php 
    echo '<h4>'.$model->name.'</h4>
     <div style="padding: 20px;">'.$model->text.'</div>';?>
</div>
<br><Br>
<div class="frame2">
<?php echo '<div style=" 
   text-align: left !important;
    padding: 20px;
    font-size: 15px;">'.$model->code.'</div>';?>


</div>
<br><Br>
<a href="exercise?n=<?php echo $id;?>" class="btn">Перейти к заданию</a>
</div>