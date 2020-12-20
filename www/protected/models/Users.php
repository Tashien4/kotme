<?php
 
class Users extends Activerecordlog
{

//---------------------------------------
	protected function beforeSave()	{
		if(parent::beforeSave()) {
			if($this->isNewRecord)	$bef=array();
			else
				$bef=$this->findbyPk($this->id);

			Log_edit::model()->protokol($this->tablename(),$this->id,$this->attributes,$bef);

			return true;
		}
		else
			return false;
	}

//---------------------------------------
public function primaryKey() {
	return 'id';
}
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
                return 'users';
            }
//---------------------------------------
            public function rules() {
                return array(
			array('id', 'length', 'max'=>5),
			array('name','length', 'max'=>100),
			array('login','length', 'max'=>50),
			array('password', 'length', 'max'=>50),

			array('lastlogin' ,'length', 'max'=>250),


			array('progerss' ,'length', 'max'=>1),
			array('email','email'),
	

                );
            }
//-----------------------------------------------
	public function attributeLabels()
	{
		return array(
			'name' => 'ФИО',
			'login' => 'Логин',
			'active_doks' => 'Продвижение пользователя',
//			'pasp_view' => '1-разрешен просмотр',
			'password' => 'Пароль',
			'email' => 'E-mail',
			'usersadmin' => '1-разрешен редактирование пользователей',
		);
	}
//---------------------------------------
	public function search($params=array()) {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
//print_r($_GET);
//print_r($this->attributes);
		$criteria=new CDbCriteria;
		$criteria->select='*';

		$criteria->condition = "(1)";
//		$criteria->condition = "(activ=1)";

		foreach($params as $field=>$pravila) {
			$criteria->condition .= ' and ('.$field.' '.$pravila.')';
		}
/*
		$criteria->with=array(
	              'lstreets'=>array('select'=>'lstreets.name',
					'limit'=>10000,
					),
		);
*/
//					'with'=>array('snpunkt'=>array('select'=>'snpunkt.name')),	

//		$criteria->condition .= (($_SESSION['forscool']==0)?'':' and (regnom like "'.$_SESSION['forscool'].'-%")');
//		$criteria->params = array(':live' => $this->live);

		$criteria->compare('id',$this->id);
//		$criteria->compare('t.id_npunkt',$this->id_npunkt,true);
//		$criteria->compare('usernamerus',$_GET['users']['usernamerus'],true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('login',$this->login,true);


	    $criteria->order='login ASC';
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
//---------------------------------------
	public function statistic($params=array()) {

	$ret=array();
	$sql=sprintf("
		SELECT users.name, users.id as id, pp.dat, pp.dow, sum(ed) as trans,day(now()) as dnow
		FROM (SELECT DISTINCT coper,day(log_edit.lastedit) as dat,weekday(log_edit.lastedit)+1 as dow,obj,key_id,1 as ed  
		      FROM `log_edit` 
		      WHERE year(log_edit.lastedit)=%s 
		            and month(log_edit.lastedit)=%s
		            and (log_edit.field!='coper')
		            and (log_edit.field!='id')
		      ) as pp
		INNER JOIN users on pp.coper=users.id
		GROUP by coper,pp.dat 
		ORDER by name;
	     ",((isset($params['year']))?$params['year']:$_SESSION['cur_god']),
		((isset($params['month']))?$params['month']:$_SESSION['cur_mes'])
	     );
//print $sql;
	$command=Yii::app()->db->createCommand($sql); 

	$sqlf=sprintf("
		SELECT users.id as id, pp.dat, sum(ed) as trans
		FROM (SELECT coper,day(log_edit.lastedit) as dat,1 as ed  
		      FROM `log_edit` 
		      WHERE year(log_edit.lastedit)=%s 
		            and month(log_edit.lastedit)=%s
		            and (log_edit.field!='coper')
		            and (log_edit.field!='id')
		      ) as pp
		INNER JOIN users on pp.coper=users.id
		GROUP by coper,pp.dat 
		;
	     ",((isset($params['year']))?$params['year']:$_SESSION['cur_god']),
		((isset($params['month']))?$params['month']:$_SESSION['cur_mes'])
	     );
//print $sql;
	$commandf=Yii::app()->db->createCommand($sqlf); 

	$rows = $command->queryAll();
	$frows = $commandf->queryAll();
	$arname = array();
	foreach($rows as $row) {
		$id=$row['id'];
		if (!isset($arname[$id])) {
			$aname=explode(' ',$row['name']);
			$name=($aname[0].' '.substr($aname[1],0,2).'.'.(($aname[2]!="")?(substr($aname[2],0,2).'.'):""));		
			$arname[$id]=$name;			
		}
		if (!isset($ret[$id]['0'])) {
			$ret[$id]=array();
			for ($i=0; $i<=$row['dnow']; $ret[$id][$i++]=array('del'=>0,'oper'=>0,'dow'=>0, 'id'=>$id, 'name'=>$arname[$id]));
		}
//print_r($ret[$id]);
		$ret[$id][$row['dat']]['dow']=$row['dow'];
		if (isset($ret[$id][$row['dat']]['del']))
			$ret[$id][$row['dat']]['del']+=$row['trans'];
		else 
			$ret[$id][$row['dat']]['del']=$row['trans'];
		$ret[$id]['0']['del']+=$row['trans'];
	}

	foreach($frows as $row) {
		$id=$row['id'];
		if (isset($ret[$id][$row['dat']]['oper']))
			$ret[$id][$row['dat']]['oper']+=$row['trans'];
		else
			$ret[$id][$row['dat']]['oper']=$row['trans'];
		$ret[$id]['0']['oper']+=$row['trans'];
	}
	usort($ret, array("Users", "cmp_obj"));
     	return ($ret);
	}
//------------------------
	function cmp_obj($a, $b) {
	    return ($a['0']["oper"]<$b['0']["oper"]);
	}
//---------------------------------------
public function find_users($famplusrod) {
	$ret=0;
	if ($famplusrod) {
		$aobr=explode(' -',$famplusrod);
		if (count($aobr)>1) $famplusrod=$aobr[0];

		$sql=sprintf("
			select tab, concat(fam,' ',im,' ',ot) as name,otdel as ingroup
			from fio
			where concat(fam,' ',im,' ',ot) like '%s'
			limit 1;
		     ;",$famplusrod.'%'
		);
		$command=Yii::app()->db->createCommand($sql); 
		$row = $command->queryRow();
		$ret=$row['tab'];
        }
	return ($ret);
}
//---------------------------------------
public function activate_users($tab=0) {
	$ret=0;
	if ($tab>0) {
		$sql=sprintf("
			INSERT IGNORE INTO users (id,name,ingroup)
			select tab, concat(fam,' ',im,' ',ot) as name,otdel as ingroup
			from fio
			where tab='%s'
		     ;",$tab
		);
//print $sql;
		$upcommand=Yii::app()->db->createCommand($sql); 
		$upcommand->execute();
        }
	return ($ret);
}
//------------------------
}