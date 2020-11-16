<?php

class Site {
            public function attributeLabels() {
                return array(
                    'inv_nom'=> 'Инветарный номер',
		    'fio'=> 'Сотрудник',
		    'org'=> 'Организация',
		    'otdel'=> 'Отдел',
                    		);
            }    

//----------------------------------------------------------
public function getCookie($name)

  {

    return Yii::app()->request->cookies[$name]->value;

  }

//----------------------------------------------------------



	public function rusprvyb($dat) { 

	    if (!isset($_SESSION['prvyball'])) {
		$_SESSION['prvyball']=His::model()->sp_prv();
	    }	
            return (isset($_SESSION['prvyball'][$dat]))?$_SESSION['prvyball'][$dat]:"-";

        }
//----------------------------------------------------------
	public function sp_prvyb($tempoli=2) { 
	   	if ($tempoli==0) {
			if (!isset($_SESSION['tempprvyb'])) 
				$_SESSION['tempprvyb']=His::model()->sp_prv($tempoli);
			return ($_SESSION['tempprvyb']);
			
		} else {
			if (!isset($_SESSION['postprvyb'])) 
				$_SESSION['postprvyb']=His::model()->sp_prv($tempoli);
			return ($_SESSION['postprvyb']);
		}

        }
//----------------------------------------------------------
	public function rusdat($dat,$fullmes=0) { 
		$ret="";
		if ($dat>0) {
			if ($fullmes>1) 
				$ret=substr($dat,8,2)."  ".Site::nztocmonth(substr($dat,5,2))."  ".substr($dat,0,4).' г.';
			elseif($fullmes>0)	$ret=substr($dat,8,2)."  ".mb_substr(Site::ntocmonth(substr($dat,5,2)),0,3,'utf8')."  ".substr($dat,0,4).' г.';
			else 	$ret=substr($dat,8,2).".".substr($dat,5,2).".".substr($dat,0,4);
		}
//		if (strlen($dat)>10) 
//	          	$ret.=(' '.substr($dat,11));
		
		return ($ret);

        }
//----------------------------------------------------------
	public function torusdat($dat) { 

//          return ($dat>0)?(substr($dat,8,2).".".substr($dat,5,2).".".substr($dat,0,4)):"";
          return ($dat>0)?(substr($dat,8,2)."".substr($dat,5,2)."".substr($dat,0,4)):"";

        }
//----------------------------------------------------------
	public function jourrusdat($dat) { 

//          return ($dat>0)?(substr($dat,8,2).".".substr($dat,5,2).".".substr($dat,0,4)):"";
          return ($dat>0)?(substr($dat,8,2).".".substr($dat,5,2).".".substr($dat,0,4)." ".substr($dat,11,8)):"";

        }
//----------------------------------------------------------
	public function jourgoddat($dat) { 

//          return ($dat>0)?(substr($dat,8,2).".".substr($dat,5,2).".".substr($dat,0,4)):"";
          return ($dat>0)?(substr($dat,11,8)):"";

        }
//----------------------------------------------------------
	public function fromrusdat($dat) { 

//          return ($dat>0)?(substr($dat,6,4)."-".substr($dat,3,2)."-".substr($dat,0,2)):"";
          return ($dat>0)?(substr($dat,4,4)."-".substr($dat,2,2)."-".substr($dat,0,2)):"";

        }
//----------------------------------------------------------
	public function ntocmonth($m) { 

		switch($m) {
		    case  "1" : $ret="Январь";break;
		    case  "2" : $ret="Февраль";break;
		    case  "3" : $ret="Март";break;
		    case  "4" : $ret="Апрель";break;
		    case  "5" : $ret="Май";break;
		    case  "6" : $ret="Июнь";break;
		    case  "7" : $ret="Июль";break;
		    case  "8" : $ret="Август";break;
		    case  "9" : $ret="Сентябрь";    break;
		    case  "10" : $ret="Октябрь";break;
		    case  "11" : $ret="Ноябрь";break;
		    case  "12" : $ret="Декабрь";break;
		    default:$ret='';
		}
		return $ret;
	}

//--------------------------------------------------------

	public function nztocmonth($m) { 

		switch($m) {
		    case  "1" : $ret="Января";break;
		    case  "2" : $ret="Февраля";break;
		    case  "3" : $ret="Марта";break;
		    case  "4" : $ret="Апреля";break;
		    case  "5" : $ret="Мая";break;
		    case  "6" : $ret="Июня";break;
		    case  "7" : $ret="Июля";break;
		    case  "8" : $ret="Августа";break;
		    case  "9" : $ret="Сентября";    break;
		    case  "10" : $ret="Октября";break;
		    case  "11" : $ret="Ноября";break;
		    case  "12" : $ret="Декабря";break;
		    default:$ret='';
		}
		return $ret;
	}
 //----------------------------------------------------------
	public function ntocdays($d) { 

		switch($d) {
		    case  "1" : $ret="Понедельник";break;
		    case  "2" : $ret="Вторник";break;
		    case  "3" : $ret="Среда";break;
		    case  "4" : $ret="Четверг";break;
		    case  "5" : $ret="Пятница";break;
		    case  "6" : $ret="Суббота";break;
		    case  "7" : $ret="Воскресенье";break;
		    default:$ret='';
		}
		return $ret;
	}

//----------------------------------------------------------
public function aupload_type($type='') {
	$a=array(
		'docx'=>'doc.jpg',
		'doc'=>'doc.jpg',
		'pdf'=>'pdf.png',
		'rar'=>'rar2.jpg',
		'zip'=>'zip4.png',
		'cer'=>'b_select.png',
		'p7b'=>'b_select.png'
	);

	return ((isset($a[$type]))?$a[$type]:null);
}

//----------------------------------------------------------
	public function nptocmonth($m) { 

		switch($m) {
		    case  "1" : $ret="Января";break;
		    case  "2" : $ret="Февраля";break;
		    case  "3" : $ret="Марта";break;
		    case  "4" : $ret="Апреля";break;
		    case  "5" : $ret="Мая";break;
		    case  "6" : $ret="Июня";break;
		    case  "7" : $ret="Июля";break;
		    case  "8" : $ret="Августа";break;
		    case  "9" : $ret="Сентября";    break;
		    case  "10" : $ret="Октября";break;
		    case  "11" : $ret="Ноября";break;
		    case  "12" : $ret="Декабря";break;
		    default:$ret='';
		}
		return $ret;
	}


	public function beforemonth() { 
		   if ($_SESSION['cur_mes'] == 1) {
		      $_SESSION['cur_mes'] = 12;
		      $_SESSION['cur_god'] = $_SESSION['cur_god'] - 1;
		   }
		   else $_SESSION['cur_mes'] = $_SESSION['cur_mes'] - 1;
		   
		   Yii::app()->params['cur_god']=$_SESSION['cur_god'];
		   Yii::app()->params['cur_mes']=$_SESSION['cur_mes'];
		return $_SESSION['cur_mes'];
	}

	public function nextmonth() { 
		   if ($_SESSION['cur_mes'] == 12) {
		      $_SESSION['cur_mes'] = 1;
		      $_SESSION['cur_god'] = $_SESSION['cur_god'] + 1;
		   }
		   else $_SESSION['cur_mes'] = $_SESSION['cur_mes'] + 1;

		   Yii::app()->params['cur_god']=$_SESSION['cur_god'];
		   Yii::app()->params['cur_mes']=$_SESSION['cur_mes'];
   
		return $_SESSION['cur_mes'];

        }	
//--------------------------------------------------------------
        public function listmesaz() {   

	for ($i=0,$listmesaz=array();$i++,$listmesaz[$i]=Site::ntocmonth($i); $i<13);
	$listmesaz[0]='--Не выбран';
	$listmesaz[999]='--Все месяцы--';
	return ($listmesaz);
}


//***************************************
function summa_pro($num) {

	$snum='|'.sprintf('% 15.2f',$num);
	$pro=' ';
	$s=' ';
	$j=4;

	if ($num==0) { $ret=' Ноль pублей ноль копеек'; }
	else {
		$pos= strpos($snum,'.');
		$cel= '  '+($pos==0)?$snum:substr($snum,0,$pos);
		while ((substr($snum,1,3))==='   ') {
			$j--;
			$snum='|'.substr($snum,4);
		}

		for ($i=3*$j; $i>=3;  $i=$i-3) {
			$pro='|'.substr($cel,-$i,3);
			if (substr($pro,1,3)!=0) {
//				$s.=($pro.'+'.$i.'++');
            			$s.=(Site::str3($pro,($i==6)?0:1));
            			switch ($i) {
               				case 12:  $s.=(' '.Site::sklon('миллиаpд',1,$pro)); break;
					case 9:   $s.=(' '.Site::sklon('миллион',1,$pro)); break;
					case 6:   $s.=(' '.Site::sklon('тысяч',0,$pro));
            			} 
         		}
		}
      		$tt= substr($pro,1);
		$i= (int) ($tt%10);

//print '6==='.$tt.'=='.$i.'='.($tt%100).'='.$s.'<br>';
		if     (($j==0) && ($i==0)) { $s=$s.' ноль pублей'; }
		elseif ($i==0) { $s=$s.' pублей'; }
      		elseif ($i==1) { $s=$s.((($tt%100)>10)&&(($tt%100)<20))?' pублей':' pубль';}
      		elseif ($i<5) { $s=$s.(((($tt%100)>10)&&(($tt%100)<20))?' pублей':' pубля'); }
      		else { $s=$s.' pублей' ;}
//$ret=('7====='.$s.'<br>');
		$pro=substr($snum,-2,2);

      		if ($pro=='00') {$s=$s.' ноль'; }
      		else { $s.=(' '.$pro); }

      		$i= (int) ($pro%10);
      		if     ($i==0) { 
			$s.=' копеек'; 
		} elseif ($i==1) { 
			$s.=(((($pro%100)>10)&&(($pro%100)<20))?' копеек':' копейки'); 
		} elseif ($i<5)  { 
			$s.=(((($pro%100)>10)&&(($pro%100)<20))?' копеек':' копейка'); 
		} else { 
			$s.=' копеек' ;
		}
	}
	$ret=trim($s);

 	return($ret);
// 	return(upper(left($s,1))+substr($s,2));
//  	return ucfirst($ret);
}

//***************************************
function str3($str,$rod) {
     $ot=''; $prom=''; $sot='';

  //--------обработка сотен-----------------
  if (strlen(''.$str)>3) {
     $prom= '|'.substr($str,1,1);
     switch ($prom) {
        case '|0': break;
        case '| ': break;
        case '|1': $ot=$ot.' сто'; break;
        case '|2': $ot=$ot.' двести'; break;
        default :  $sot=((0+substr($prom,1,1)) < 5)?'ста':'cот'; 
                  $ot.=Site::name_number($prom,$rod).$sot;
     }
     $str= '|'.substr($str,2);
  }

  	$prom= '|'.substr($str,1,1);
	$str = '|'.substr($str,2,1);
	if (($prom=='|0')|| ($prom=='| ')) { 
		$ot.=Site::name_number($str,$rod); // только единицы
	}  elseif ($prom=='|1') {
	        switch ($str) {
			case '|0': $ot.=' десять'; break;
			case '|2': $ot.=(Site::name_number($str,0).'надцать'); break;
			case '|3': $ot.=(Site::name_number($str,0).'надцать'); break;
//			default  : $ot.=(substr(Site::name_number($str,1),0,strlen(Site::name_number($str,1))-1).'надцать');
			default  : $ot.=(substr(Site::name_number($str,1),0,strlen(Site::name_number($str,1))).'надцать');
		}
	} else { 
		$tt=substr($prom,1);
		$ot=$ot.(($tt==4)?' соpок': 
                        (($tt==9)?' девяносто':
                        (($tt<4) ? Site::name_number($prom,1).'дцать':
                        (($tt<9) ? Site::name_number($prom,0).'десят':''))));
                        $ot.=Site::name_number($str,$rod);
  	}
return $ot;
}
//*****************************************
function name_number($number,$rod) {

/* возвpащает словом название цифpы number
 * в женском pоде, если rod=0
 * в мужском pоде в пpотивном случае
 */
 switch ($number) { 
   case '|0': $ret=''; break;
   case '|1': $ret=($rod==0)?' одна':' один';break;
   case '|2': $ret=($rod==0)?' две':' два';break;
   case '|3': $ret=' тpи'; break;
   case '|4': $ret=' четыpе'; break;
   case '|5': $ret=' пять'; break;
   case '|6': $ret=' шесть'; break;
   case '|7': $ret=' семь'; break;
   case '|8': $ret=' восемь'; break;
   case '|9': $ret=' девять'; break;
   default: $ret=''; break;
  }
return $ret;
}
//********************************************
function sklon($s,$rod,$num) {
	$ret='';
	$tt=substr($num,1);
	$n = (int) $tt%10;
	if ((($tt%100)>9)&&(($tt%100)<=20)) { 
		$ret.=($s.(($rod==1)?'ов':'')); 
	} elseif ($n==1) { 
		$ret.=($s.(($rod==1)?'':'а')); 
	} elseif ((($n<5)&&($n>0))) {
		$ret.=($s.(($rod==1)?'а':'и'));
	} else { 
		$ret.=($s.(($rod==1)?'ов':'')); 
	}

  return $ret;
}
//-----------------------------------------------------------
	public function fio_relationlist($id=0) {

	if ($id==0)
		return '-не определено-';
	else {
		$aret=array();
		$aret['0']='-не определено-';
		$sql=sprintf("
			select id,name
			from _rel
			where %s
			order by id;
		     ",($id>0)?('id='.(string)$id):'1'
		);
		$command=Yii::app()->db->createCommand($sql); 
		$prows = $command->queryAll();
		if ($id>0)
			return $prows[0]['name'];
		else {
        		foreach($prows as $prow) {
				$aret[$prow["id"]]=$prow["name"];
		        }
	        	return $aret;
		}
	}
}

//-----------------------------------------------------------
	public function protokol($obj,$key_id,$newvalue,$bef=array()) {
		foreach($newvalue as $key=>$value) {
			$oldvalue=(!isset($bef[$key]))?'':$bef[$key];
			if (($key!='lastedit') and ($oldvalue!=$value)) {
				$log=new Log_edit;

				$log->obj=$obj;
				$log->field=$key;
				$log->key_id=$key_id;
				$log->oldvalue=$oldvalue;
				$log->newvalue=$value;
				$log->coper=Yii::app()->user->id;
				if(!$log->save()) ;
			} 
		}
	
	}

//-----------------------------------------------------------
public function listAllOtdels() {

		$command=Yii::app()->db->createCommand("
			SELECT DISTINCT otdels.*
			from kadry_vse.fio t
			inner join kadry_vse.otdels ON otdels.kod=t.otdel
			where t.id_predpr=1 AND (END='0000-00-00')
			order by otdels.pp
		");
		$urecords = $command->queryAll();
		$ret=array(0=>'');
		foreach($urecords as $row )
		{
			$ret[$row['kod']]=$row['fullname'];
		}

		return $ret;
	}

//-----------------------------------------------------------
static function cut0($ret=0) {   
	$a=explode('.',$ret);
	if((0+$a[1])==0) $ret=$a[0];
	else $ret=$a[0].'.'.($a[1]+0);
		
		
	return $ret;
}
//-----------------------------------------------------------
public static function GetInTranslit($string,$withtochka=0) {
	$replace=array(
		" "=>"_",
		"+"=>"_",
		"'"=>"",
		"`"=>"",
		"№"=>"N",
		","=>"_",
		"("=>"_",
		")"=>"_",
		"\""=>"_",
		"/"=>"_",
		"!"=>"_",
		"@"=>"_",
		"#"=>"_",
		"&"=>"_",
		"*"=>"_",
		"%"=>"_",
		"^"=>"_",
		":"=>"_",
		"|"=>"_",
		"а"=>"a","А"=>"a",
		"б"=>"b","Б"=>"b",
		"в"=>"v","В"=>"v",
		"г"=>"g","Г"=>"g",
		"д"=>"d","Д"=>"d",
		"е"=>"e","Е"=>"e",
		"ж"=>"zh","Ж"=>"zh",
		"з"=>"z","З"=>"z",
		"и"=>"i","И"=>"i",
		"й"=>"y","Й"=>"y",
		"к"=>"k","К"=>"k",
		"л"=>"l","Л"=>"l",
		"м"=>"m","М"=>"m",
		"н"=>"n","Н"=>"n",
		"о"=>"o","О"=>"o",
		"п"=>"p","П"=>"p",
		"р"=>"r","Р"=>"r",
		"с"=>"s","С"=>"s",
		"т"=>"t","Т"=>"t",
		"у"=>"u","У"=>"u",
		"ф"=>"f","Ф"=>"f",
		"х"=>"h","Х"=>"h",
		"ц"=>"c","Ц"=>"c",
		"ч"=>"ch","Ч"=>"ch",
		"ш"=>"sh","Ш"=>"sh",
		"щ"=>"sch","Щ"=>"sch",
		"ъ"=>"","Ъ"=>"",
		"ы"=>"y","Ы"=>"y",
		"ь"=>"","Ь"=>"",
		"э"=>"e","Э"=>"e",
		"ю"=>"yu","Ю"=>"yu",
		"я"=>"ya","Я"=>"ya",
		"і"=>"i","І"=>"i",
		"ї"=>"yi","Ї"=>"yi",
		"є"=>"e","Є"=>"e"
	);
	if ($withtochka>0) $replace['.']='_';
	return $str=iconv("UTF-8","UTF-8//IGNORE",strtr($string,$replace));
}
//-----------------------------------------------------------

//-----------------------------------------------------------
public function sp_adr($tab=0) {   
        $ret=array();
	$sql=sprintf("
		select _zdan.adress,kab,fio,tab
		from bit._user	
		where tab=%s

        ", $tab);

	$command=Yii::app()->db->createCommand($sql);
	
	$rows= $command->queryAll();
 	foreach($rows as $row) {
      	$ret=$row;
    }  
//print_r($rows);
	return $ret;
	} 

}

