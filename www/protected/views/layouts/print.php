<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/'.$this->pageTitle;?>.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/'.$this->pageTitle;?>.css" media="screen" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<?php echo $content; ?>
</body>
<script type="text/javascript"> 
//<![CDATA[
window.onload=function printPage()
{
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
//]]>
</script>

</html>