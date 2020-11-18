<?php
class Begin extends Activerecordlog
{

   

//---------------------------------------
            public static function model($className=__CLASS__)
            {
                return parent::model($className);
            }
//---------------------------------------
            public static function getData($className=__CLASS__)
            {
                return parent::model($className);
            }
//---------------------------------------
            public function tableName()
            {
                return 'begin';
            }
//---------------------------------------
            public function rules() {
                return array(
			array('id', 'length', 'max'=>50,'message'=>'Ошибка 1'),
			array('text' ,'length', 'max'=>1000,'message'=>'Ошибка 2'),
                );
            }
//---------------------------------------
    public function relations()    {
	return array(
                'hfio'=>array(self::BELONGS_TO, 'Fio', 'tabv'),
                'ohfio'=>array(self::BELONGS_TO, 'Fio', 'tab'),
  	           'otfio'=>array(self::BELONGS_TO, 'Myotchet', 'tabv'),
   
	);
    }
//---------------------------------------
            public function attributeLabels() {
                return array(
 		   'fio'=> 'Сотрудник',
		    'org'=> 'Ведомство',
		    'otdel'=> 'Отдел',
		    'nom'=> 'Номер',                
                    'id'=> 'Документ',
                    'nazn'  => 'Назначение',
                    'data' => 'Дата',
                    'tabv' => 'Владелец',
                    'tab' => 'Получатель',
                    'prim' => 'Примечание',
                    'srok' => 'Срок',

                    'system'  => 'Система',
                    'datae'  => 'Дата',
                    'event' => 'Событие',
                    'time' => 'Время',
                    'place'  => 'Место проведения',
	                  'IBP'  => 'ИБП',
	                  'mouse'  => 'мышь',	
	                  'key'  => 'Клавиатура',	
                    'power'  => 'Блок питаня',
                    'HDD'  => 'Жесткий диск',
                    'OP'  => 'Оперативная память',
                    'vent'  => 'Вентилятор для процессора',
                    'proz'  => 'Процессор',
                    'MP'  => 'Материнская плата',
                    'name' => 'ФИО',
                    'who'  => 'Должность',
                    'datebd'  => 'Дата рождения',
                    'rod'  => 'Родился',
			'vne' =>'ВнеОч',
			'lgot'=>'ПервоОч',
			'dop100'=>'ПоОплате',

                );
            }    
//-------------------------------------
public function primaryKey() {
        return 'id';
    }
//-------------------------------------

public function sp_Fio() {
	$ret='';
	
		$sql=sprintf("
			SELECT 	fio
			FROM _typepc  
			WHERE id=%s
		",$type);

		$command=Yii::app()->db->createCommand($sql);
		$row = $command->queryRow();
			$ret=$row['name'];
			return $ret;
	
}
//-------------------------------------
//----------------------------------------------------------------------------
public function getCharacterText($id) {
	if($id==0) $id=1;
		$command=Yii::app()->db->createCommand("
			SELECT text
			FROM `character_replics`
			WHERE id=".$id);
		$urecords = $command->queryRow();
		return ($urecords['text']);
	
}

//-------------------------------------
public function listSys() {
		$command=Yii::app()->db->createCommand("
			SELECT *
			FROM _system
			WHERE 1 order by name
		");
		$urecords = $command->queryAll();
		$ret=array();
		foreach($urecords as $row )
		{
			$ret[$row['id']]=$row['name'];
		}

		return ($ret);
	}
//-------------------------------------

public function listtabv() {
		$command=Yii::app()->db->createCommand("
			SELECT *
			FROM _owner
			WHERE 1 order by name
		");
		$urecords = $command->queryAll();
		$ret=array();
		foreach($urecords as $row )
		{
			$ret[$row['id']]=$row['name'];
		}

		return ($ret);
	}

//------------------------------------------------
public function sp() {   
        $ret=array();
	$sql=sprintf("
		select *
		from his
		where 1
		order by data desc,id desc 

        ");

	$command=Yii::app()->db->createCommand($sql);
	
	$rows= $command->queryAll();
// 	foreach($rows as $row=>$key) {
//      	$ret=$rows();
	               
 // 	  $ret[$row['tab']]=$row;
//	  $rez[$ret]=$ret;
//    }  
//print_r($rows);
	return ($rows);
	} 
//---------------------------------------
public function listFio($tab=0) {
		$ret=array();
	//	$ret[-1]=' СКЛАД';
	if ($tab==-1)
		$ret='СКЛАД';
	else {
		$sql=sprintf("
			SELECT fio.tab,fio.otdel,ot.kod,if(tab=-1,'СКЛАД',ot.fullname)as fullname,if(tab=-1,'СКЛАД',fio.fio)as fio 	
			FROM kadry_vse.fio
			left join kadry_vse.otdels ot on ot.kod=fio.otdel  
			WHERE tab=%s
			
		",$tab);
		$command=Yii::app()->db->createCommand($sql);
		$urecords = $command->queryAll();
		foreach($urecords as $row )
		{      // if ($row['tab']<0) {$ret=' СКЛАД';} else {
			$ret=$row['fio'].'  ( '.$row['fullname'].')';
		//}
			
		}
	}
	return ($ret);
	
}
	
//---------------------------------------

public function listAllfio() {
		$ret=array();
		$command=Yii::app()->db->createCommand("
			SELECT fio.tab,fio.fio,fio.otdel,ot.kod,ot.fullname 	
			FROM kadry_vse.fio
			inner join kadry_vse.otdels ot on ot.kod=fio.otdel  
			WHERE 1
			order by ot.fullname
		");
		$urecords = $command->queryAll();
		foreach($urecords as $row )
		{
			$ret[$row['tab']]=$row['fio'].'  ( '.$row['fullname'].')';
		}

		return ($ret);
	
}
	
//---------------------------------------
	public function search($params=array()) {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
//		$criteria->select='id,idd,id_piar,id_ul,id_dom,id_npunkt,adr,dom1,dom2,kv,irc_uni,ee_ls,fio,vids,sq,kol,kadastrn,begin,end,lgtypes,osnovan,censored,kadastrn'; //,if((isNull(end) or (end=0)),1,0) as live';
//		$criteria->condition = "(isNull(okoosn) or (okoosn<>'ОТОЗВАНО') or not (:live)) ";
		$criteria->condition = "(1)";
		foreach($params as $field=>$pravila) {
			$criteria->condition .= ' and ('.$field.' '.$pravila.')';
		}
		$criteria->with=array(
	             
 				'hfio'=>array('select'=>'fio,dolg,otdel',
					'limit'=>10000,
					), 
		);
//					'with'=>array('snpunkt'=>array('select'=>'snpunkt.name')),	

//		$criteria->condition .= (($_SESSION['forscool']==0)?'':' and (regnom like "'.$_SESSION['forscool'].'-%")');
//		$criteria->params = array(':live' => $this->live);

		$criteria->compare('otfio.fio',$this->tabv,true);
		$criteria->compare('hfio.fio',$this->tab,true);

//		$criteria->compare('t.type',$this->type);
//		$criteria->params = array(':live' => $this->live);

//	    $criteria->order='t.tab,inv_nom,type ASC';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
//---------------------------------------

        	public function timeauto($tab=0) {
   		$resStr=array();
                            $sql=sprintf("
				select tabel.id, event.name, tabel.datae,_place.place,_place.id as id_place,tabel.timemb,tabel.timeend
				from tabel
				inner join _place on _place.id=tabel.place 
				inner join event on event.id=tabel.id_event 
				where tabel.tab=%s 
			       ", $tab);

			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryAll();
//print $sql;
		//	foreach($prows as $prow) {
		//		$resStr[$prow['id']]= $prow['time'];
		//	}
		
	       	return $prows;

}
//---------------------------------------
	
//---------------------------------------

        	public function hours() {
   		$resStr=array();
			for($i=6;$i<21;$resStr[(++$i)]=$i);
	       	return $resStr;

}
//---------------------------------------	
//---------------------------------------

        	public function minutes() {
   		$resStr=array();
			for($i=-5;$i<55;$resStr[($i+=5)]=$i);
	       	return $resStr;

}
	        
//------------------------------------------------

public static function times($ti='') {
	$ret=array();
	$connection=Yii::app()->db; 
		$sql1=sprintf("
		insert ignore into _time(time) values('%s');
		SELECT id,time
		FROM _time
		WHERE time like '%s'
		LIMIT 1
	",$ti,$ti
	);
	$command=$connection->createCommand($sql1);
	$rowCount=$command->execute();
print $sql1;

        $sql=sprintf("
		SELECT id,time
		FROM _time
		WHERE time like '%s'
		LIMIT 1
		;","%".$ti."%"
	);
	$command=$connection->createCommand($sql);
	$row = $command->queryRow();

//print $sql;
       	$prow = $command->queryRow();
	if ($prow['id']) {
               	$ret['id']=$prow['id'];
               	$ret['time']=$prow['time'];
            	}
//print_r($ret);
	return $ret;
}
//---------------------------------------

        	public function places() {
   		$resStr=array();
		

                            $sql=sprintf("
				select *
				from _place
				where 1 
			       ");

			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryAll();
//print $sql;
			foreach($prows as $prow) {
				$resStr[$prow['id']]= $prow['place'];
			}
		
	       	return $resStr;

}
//---------------------------------------
public function birthdays() {
	$sql=sprintf('
		(
		SELECT rod AS datebd, CONCAT( fio.fam,  " ", fio.im,  " ", fio.ot ) AS name, dolg AS who
		FROM fio
		INNER JOIN birthday bd ON bd.name = CONCAT( fio.fam,  " ", fio.im,  " ", fio.ot ) 
		WHERE CONCAT( fio.fam,  " ", fio.im,  " ", fio.ot )!=bd.name 
		AND (fio.end > CURDATE( ) 
		OR fio.end =  "0000-00-00")
		)
	UNION (
		SELECT datebd, name, who
		FROM birthday
		WHERE 1
	     )');
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryAll();
		
	       	return $prows;


}	
//---------------------------------------
public function listPlace($type='') {
		$sql=sprintf("
			SELECT 	*
			FROM _place  
			WHERE %s
		",($type=='')?'1':('id='.$type));
		$command=Yii::app()->db->createCommand($sql);
		$urecords = $command->queryAll();
		$ret=array();
		foreach($urecords as $row )
		{
			$ret[$row['id']]=$row['place'];
		}

		return ($ret);
	
}

//----------------------------------------------------------------------------
public function findbyevent($event) {
        $ret=null;
	if ($event) {
		$sql=sprintf("
			select id
			from event 
			where name like '%s'
			limit 1
		     ;",'%'.$event.'%'
		);
		$command=Yii::app()->db->createCommand($sql); 
		$row = $command->queryRow();
		$ret=$row['id'];

        }
	return ($ret);
}

//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
public function events($event) {
        $ret=null;
	if ($event) {
		$sql=sprintf("
			select name
			from event 
			where id='%s'
			limit 1
		     ;",'%'.$event.'%'
		);
		$command=Yii::app()->db->createCommand($sql); 
		$row = $command->queryRow();
		$ret=$row['name'];

        }
	return ($ret);
}

//----------------------------------------------------------------------------

public function bdup($datebd,$name,$who) {   
     		$sql=sprintf("
			insert ignore into birthday(datebd,name,who)
			values ('%s','%s','%s')
			;
			",$datebd,$name,$who
		);
print $sql;
		Yii::app()->db->createCommand($sql)->execute();
} 
//----------------------------------------------------------------------------
public function eventNew($name) {   
     		$sql=sprintf("
			insert ignore into event(name) values('%s');	
			",$name
		);
print $sql;
		Yii::app()->db->createCommand($sql)->execute();
} 

//------------------------------------------------
public function viewAll($type="") {
	$a=$this->attributes;
	$t=$this->listPlace(); $a['place']=$t[$a['place']];
return ($a);
}
//------------------------------------------------
//------------------------------------------------
public function listNom() {
	$resStr=array();
			for($i=0;$i<10;$resStr[(++$i)]=$i);
	       	return $resStr;

}
//------------------------------------------------
public function findbyfio($famplusrod) {
	$ret=array();
	if ($famplusrod) {
		$aobr=explode(' -',$famplusrod);
		if (count($aobr)>1) $famplusrod=$aobr[0];

		$sql=sprintf("
			select tab
			from fio
			where concat(fam,' ',im,' ',ot) like '%s'
			limit 1;
		     ;",$famplusrod.'%'
		);

		$command=Yii::app()->db->createCommand($sql); 
		$rows = $command->queryRow();
		$ret=$rows['tab'];
        }
	return ($ret);
}
//---------------------------------------
        	public function fio($tab) {
   		$resStr=array();
                            $sql=sprintf("
				select fio
				from bit.fio
				where tab=%s
				limit 1 
			       ",$tab);
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryRow();
		
				$resStr= $prows['fio'];
		return $resStr;

} 
//---------------------------------------
 //----------------------------------------------------------
	public function timess($dates) { 
              $t=date("m",strtotime($dates));
		switch($t) {
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
	        $datas=date("d",strtotime($dates)).' "'.$ret.'" '.date("Y",strtotime($dates));
   		return $datas;
}

//---------------------------------------
        	public function dolg($tab) {
   		$resStr=array();
                            $sql=sprintf("
				select dolg
				from bit.fio
				where tab=%s
				limit 1 
			       ",$tab);
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryRow();
		
				$resStr= $prows['dolg'];
		return $resStr;

} 
//---------------------------------------
        	public function otdel($tab) {
   		$resStr=array();
                            $sql=sprintf("
				select ot.fullname
				from kadry_vse.fio
				inner join kadry_vse.otdels ot on ot.kod=fio.otdel
				where tab=%s
				limit 1 
			       ",$tab);
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryRow();
		
				$resStr= $prows['fullname'];
		return $resStr;

} 
//---------------------------------------
//---------------------------------------
        	public function zdan($tab) {
   		$resStr=array();
                            $sql=sprintf("
				select zd.adres
				from kadry_vse.fio
				inner join kadry_vse._zdan zd on zd.id=fio.zdan
				where tab=%s
				limit 1 
			       ",$tab);
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryRow();
		
				$resStr= $prows['adres'];
		return $resStr;

} 
//---------------------------------------
public function sp_mod($withouttab=0) {
	// параметр: 
	//	0 - array($tab=>$name)
	//	1 - array($pp=>$name)
	//	2 - array($pp=>$tab)

        $ret=array();
	if (true) {
		$sql=sprintf("
			select id,type
			from _typetec 
			where id<10
		
		     ;"
		);
		$command=Yii::app()->db->createCommand($sql); 
		$rows = $command->queryAll();
		foreach($rows as $row)	{	
			if ($withouttab>1) $ret[]=$row['id'];
			elseif ($withouttab>0) $ret[]=$row['type'];
			else $ret[$row['id']]=$row['type'];
		}

        }
	return ($ret);
}
//---------------------------------------
public function sd_mod($withouttab=0) {
	// параметр: 
	//	0 - array($tab=>$name)
	//	1 - array($pp=>$name)
	//	2 - array($pp=>$tab)

        $ret=array();
	if (true) {
		$sql=sprintf("
			select id,type
			from _typetec 
			where 1
		
		     ;"
		);
		$command=Yii::app()->db->createCommand($sql); 
		$rows = $command->queryAll();
		foreach($rows as $row)	{	
			if ($withouttab>1) $ret[]=$row['id'];
			elseif ($withouttab>0) $ret[]=$row['type'];
			else $ret[$row['id']]=$row['type'];
		}

        }
	return ($ret);
}
//---------------------------------------
//---------------------------------------
public function _mod() {
        $ret=array();
			for($i=0;$i<12;$ret[(++$i)]='Исправно?');
	       	return $ret;

}
//---------------------------------------
//---------------------------------------
  public function fromArr($amod=array()) {  
	$ret=''; 
	$ar=$this->sp_mod(2);
	
	foreach($amod as $pp=>$key) $ret.=($ar[$key].',');
	return($ret);

  }
//---------------------------------------
 public function fromArrTwo($amod=array()) {  
	$ret=''; 
	$ar=$this->sd_mod(2);
	
	foreach($amod as $pp=>$key) $ret.=($ar[$key].',');
	return($ret);

  }
//---------------------------------------
  public function comeback($tec=array()) {  
$resStr='';
$t=strlen($tec);
$tec=substr($tec,0,($t-1));	
        	$sql=sprintf("
			select id,type
			from _typetec 
			where id in (%s)
		     ;",$tec
		);
		$command=Yii::app()->db->createCommand($sql); 
		$rows = $command->queryAll();
	foreach($rows as $row)	{	
	       $resStr.='<br>'.$row['type'];
	
	}

	return($resStr);

  }
//---------------------------------------
public function act($nom,$invlist,$data,$datae,$gurl) {   
     		$sql=sprintf("
			insert into act (nom,invlist,data,datae,tec) values(%s,'%s','%s','%s','%s');	
			",$nom,$invlist,$data,$datae,$gurl
		);
print $sql;
		Yii::app()->db->createCommand($sql)->execute();
} 
//---------------------------------------
        	public function view($nom,$invlist,$data,$datae,$gurl) {
   		$resStr=array();
                            $sql=sprintf("
				select id
				from act
				where nom=%s and invlist='%s' and data='%s' and datae='%s' and tec='%s'
				limit 1 
			       ",$nom,$invlist,$data,$datae,$gurl);
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryRow();
		
				$resStr= $prows['id'];
		return $resStr;

} 
//---------------------------------------
//---------------------------------------
        	public function stage($id) {
   		$resStr=array();
                            $sql=sprintf("
				select *
				from act
				where id=%s
			       ",$id);
			$command=Yii::app()->db->createCommand($sql);
			$prows = $command->queryAll();
		
				
		return $prows;

} 
//---------------------------------------

  public function ck($tec) {  
$resStr='';
        	$sql=sprintf("
			select id,type
			from _typetec 
			where id =%s
		     ;",$tec
		);
		$command=Yii::app()->db->createCommand($sql); 
		$rows = $command->queryAll();
	foreach($rows as $row)	{	
	       $resStr=$row['type'];
	
	}

	return($resStr);

  }
//---------------------------------------
  public function back($tec=array()) {  
$resStr='';
$t=strlen($tec);
$tec=substr($tec,0,($t-1));	
        	$sql=sprintf("
			select id,type
			from _typetec 
			where id not in (%s)
		     ;",$tec
		);
		$command=Yii::app()->db->createCommand($sql); 
		$rows = $command->queryAll();
		return($rows);

  }
//---------------------------------------
//---------------------------------------
}
?>