// Запускаем срипт после того, как будет загружена DOM:
$(function(){
 $('table#table_dia').visualize({type: 'pie', height: '300px', width: '420px'});
	$('table#table_dia').visualize({type: 'bar', width: '420px', parsedirection: 'y'});
	$('table#table_dia').visualize({type: 'area', width: '420px'});
	$('table#table_dia').visualize({type: 'line', width: '420px'});
});