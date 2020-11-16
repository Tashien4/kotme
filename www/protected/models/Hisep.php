<?php
class Hisep extends CActiveRecord
{

   public $live=1;
   public $regnom='';
   public $fam='';
   public $im='';
   private $id;
   public $data;
   public $tab;
   public $tabv;
   public $system;
   public $namekey;
   public $ser_nomKey;

   public $srok;
   public $otdel;
   public $org;
   public $nazn;
   public $prim;
   public $histype=array(
		'0'=>' ',
		'1'=>'Постоянно',
		'2'=>'Временно',
	);
//   static $rsp_prv=$this->sp_prv();


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
                return '_owner';
            }
//---------------------------------------
            public function rules() {
                return array(
			array('id,tab,tabv,srok', 'length', 'max'=>7,'message'=>'Ошибка 1'),
			array('nazn,prim,namekey,ser_nomKey' ,'length', 'max'=>250,'message'=>'Ошибка 2'),
			array('data,org,otdel,system','length', 'max'=>20,'message'=>'Ошибка 3'),
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
                
                    'id'=> 'Документ',
                    'nazn'  => 'Назначение',
                    'data' => 'Дата',
                    'tabv' => 'Владелец',
                    'tab' => 'Получатель',
                    'prim' => 'Примечание',
                    'srok' => 'Срок',

                    'system'  => 'Система',
                    'namekey'  => 'Имя ключа',
                    'ser_nomKey' => 'Серийный номер',
                    'qzakaz["dop100fact"]' => 'Факт.опл',
                    'qzakaz["sfio"]["fam"]'  => 'Фамилия',
	                  'qzakaz["sfio"]["im"]'  => 'Имя',
	                  'qzakaz["sfio"]["ot"]'  => 'Отчество',	
	                  'qzakaz["sfio"]["rod"]'  => 'Родился',	
                    'qzakaz["sfio"]["famz"]'  => 'ФИО заявителя',
                    'qzakaz["sfio"]["tel"]'  => '№ телефона',
                    'qzakaz["sfio"]["rab1"]'  => 'Место работы',
                    'qzakaz["sfio"]["raion"]'  => 'Место жительства',
                    'qzakaz["sfio"]["scool"]'  => 'Школа',
                    'qzakaz["sfio"]["pasp_ser"]'  => 'Данные паспорта',
                    'fam' => 'Фамилия',
                    'im'  => 'Имя',
                    'ot'  => 'Отчество',
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
	
 public function listOrg() {
		$ret=array();
		$command=Yii::app()->db->createCommand("
			SELECT fio.fio,fio.tab,fio.otdel,ot.kod,ot.fullname 	
			FROM kadry_vse.fio
			inner join kadry_vse.otdels ot on ot.kod=fio.otdel  
			WHERE 1
			order by ot.fullname
		");
		$urecords = $command->queryAll();

		foreach($urecords as $row )
		{
			$ret[$row['kod']]=$row['fullname'];
		}

		return ($ret);
	
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

}
?>