<?php
class Log_edit extends CActiveRecord
{

   public $live=1;

//---------------------------------------
	protected function beforeSave()	{
		if(parent::beforeSave()) {
			return true;
		}
		else
			return false;
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
                return 'log_edit';
            }
//---------------------------------------
            public function rules() {
                return array(
			array('id,coper,key_id', 'length', 'max'=>7),
			array('obj,field' ,'length', 'max'=>15),
			array('newvalue,oldvalue' ,'length', 'max'=>100),
                );
            }
//---------------------------------------
            public function attributeLabels() {
                return array(
                    'id'=> 'Документ',
                    'coper'  => 'Код оператора',
                    'obj' => 'Таблица',
                    'field'=>'Поле',
                    'oldvalue' => 'Стар.значение',
                    'newvalue' => 'Новое значение',
                    'lastedit' => 'Время изменения',
                    'lusers.usernamerus' => 'Имя оператора',
                );
            }    
//---------------------------------------
    public function relations()
    {
        return array(
           'lusers'=>array(self::BELONGS_TO, 'Users', 'coper'),
        );
    }
//---------------------------------------
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
	public function search($tab='',$temp=0) {


//		$lager=0;$smena=0;
//		$dop=(($liveonly)?'(t.status>=0)':'1');
		$dop=(($tab)?('(t.id_fio='.$tab.')'):'1');
		$dop.=(' and (t.temp='.$temp.')');
		$criteria=new CDbCriteria;
		$criteria->with=array(
	              'lusers'=>array('select'=>'usernamerus',
//					'with'=>array('sfio'=>array('select'=>'sfio.id,fam,im,ot,rod,rab1,tel,famz,imz,otz,pasp_nom,pasp_ser,pasp_dat,pasp_kem,raion,ul,dom,kv,scool,klass,liter')),	
					'limit'=>10000,
					),
		);
/*
		if ($filtr) {
			if ($filtr>10000) { 	// если нужна одна из 9 категорий статистики
				$tt=$filtr%10000;			
				$pp=(($filtr-$tt)/10000)-1;			
				$plat =$pp%3;			
				$dop.=' and ( qzakaz.dop100fact'.(($plat==2)?"=0":(($plat==1)?"=1":">1")).')';
				$katpp=($pp-$plat)/3;		
				$dop.=' and ( qzakaz.statuslgot'.(($katpp==2)?"=11":(($katpp==1)?"=10":"<10")).')';	
				$smena=$tt%10;			
				$lager=($tt-$smena)/10;
			} else {
				$smena=$filtr%10;			
				$lager=($filtr-$smena)/10;
			}
//			$smena=$filtr%10;			
//			$lager=($filtr-$smena)/10;
			if ($lager) $dop.=' and ( lager ='.$lager.')';
			if ($smena) $dop.=' and ( smena ='.$smena.')';
			$criteria->order='t.id';
			$criteria->limit=10000;
		} else {	$criteria->order='lastedit DESC';
		}
*/
		$criteria->order='t.id';
		$criteria->condition = $dop;


		$criteria->compare('t.id',$this->id);
//		$criteria->compare('hbls.adr',$this->adr);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
}
//---------------------------------------
public function statist_coper($days=30) {
//var_dump($key);
	$command=Yii::app()->db->createCommand(
		sprintf("
			select usernamerus as name,count(*) as cou
			from log_edit
			left join users on users.id=log_edit.coper
			where lastedit between datediff(now(),- %s) and now()
			group by coper;
			order by coper;
		        ",$days
		)
	);
//var_dump($command->text);
	$prows = $command->queryAll();
	$ret=array();
	$ret['0']='';
        foreach($prows as $prow) {
       	         $ret[$prow['name']]=$prow['cou'];
        }
	return ($ret);
}
//---------------------------------------
public function replnewid($id) {
	if ($needrepl=$this->findAllbyattributes(
			array(	'coper'=>Yii::app()->user->id,
				'osot'=>'New',
				'key_id'=>'0'
			)
		  )
	)
	if($needrepl) 
		foreach($needrepl as $rec) {
			$rec->key_id=$id;
			$rec->save();
		}
	
}
//---------------------------------------
}
?>