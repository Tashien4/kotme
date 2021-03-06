/*
//type: string. ��� ���������. ����� ������������ 'bar', 'area', 'pie', 'line'. �� ���������: 'bar'.
//width: number. ������ ���������. �� ���������: ������ �������.
//height: number. ������ ���������. �� ���������: ������ �������.
//appendTitle: boolean. ���������� ���������� ��������� � ���������. �� ���������: true.
//title: string. ��������� �������. �� ���������: ������� caption �������.
//appendKey: boolean. ���������� ���������� ������� � ���������. �� ���������: true.
//colors: array. ������ ��������� ����������������� ��������, ������������ � ������� �������� ��� ������ ���������. �� ���������:['#be1e2d','#666699','#92d5ea','#ee8310','#8d10ee','#5a3b16','#26a4ed','#f45a90','#e9e744']
//textColors: array. ������ ��������� ����������������� ��������. ������ ����� ������������� ������� colors. null/�������������� ������� ����� ������� ��������� �� CSS ��� ����� ������. �� ���������: [].
//parseDirection: string. ����������� ������� �������. ����� ������������ 'x' � 'y'. �� ���������: 'x'.
//pieMargin: number. ������������ ������ �������� ���������. �� ���������: 20.
//pieLabelPos: string. ��������� ����� � �������� ���������. ����� ������������ 'inside' � 'outside'. �� ���������: 'inside'.
//lineWeight: number. ������ ����� � �������� � ��������� ���������. �� ���������: 4.
//barGroupMargin: number. ������������ ������ ������ ������ ��������� � ����������� ���������. �� ���������: 10.
//barMargin: number. ������������ ������ �������� � ����������� ��������� (����������� � ������ ������� ��������). �� ���������: 1
*/
// ��������� ����� ����� ����, ��� ����� ��������� DOM:
/*
$(function(){
	$('table#table_dia').visualize({type: 'bar', width: '420px',parsedirection:'y',caption:'���������� �������� ��� �� ��������'});
});
*/


          $(function(){
              var optionsdia = {
                    height: '300px',
                    width: '650px',
		    type: 'bar',
		    parsedirection: 'y',
		    colors: ['#000000','#666699','#92d5ea','#ee8310','#8d10ee','#5a3b16','#26a4ed','#f45a90','#e9e744']
              };

	     $('table#table_dia').visualize(optionsdia);
          });

//.appendTo('body').trigger('visualizeRefresh');
