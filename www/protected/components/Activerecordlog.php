<?php
class Activerecordlog extends CActiveRecord {        

private $needfillnew=0;
public $lastinsertedid;
//---------------------------------------
	protected function afterFind()
	{
		parent::afterFind();
//		$this->_oldTags=$this->tags;
	}
//---------------------------------------
	protected function beforeSave()	{
		$osot='';
		if(parent::beforeSave()) {
			if($this->isNewRecord)	{
				$bef=array('id'=>'9999999');
				$osot='New';
				$this->needfillnew=1;
			} else {
				$bef=$this->findbyPk($this->id);
				$this->needfillnew=0;
			}

			$this->protokol($this->tablename(),$this->id,$this->attributes,$bef,$osot);

			return true;
		}
		else
			return false;
	}

//---------------------------------------
	protected function afterSave()
	{
		parent::afterSave();
		if ($this->needfillnew) {
			$this->lastinsertedid=Yii::app()->db->getLastInsertID(); 
			Log_edit::model()->replnewid($this->lastinsertedid);
			$this->needfillnew=0;
		}
	}
//---------------------------------------
	protected function beforeDelete() {
		$osot='';
		if(parent::beforeDelete()) {
				$osot='Del';
				$bef=array(); //$this->findbyPk($this->id);
				$this->needfillnew=0;
			}

		$this->protokol($this->tablename(),$this->id,$this->attributes,$bef,$osot);
		return true;
	}

/*
//---------------------------------------------
public function getValidators($attribute=null)
{
    if($this->_validators===null)
        $this->_validators=$this->createValidators();

    $validators=array();
    $scenario=$this->getScenario();
    foreach($this->_validators as $validator)
    {
        if($validator->applyTo($scenario))
        {
            if($attribute===null || in_array($attribute,$validator->attributes,true))
                $validators[]=$validator;
        }
    }
    return $validators;
}
*/
//-----------------------------------------------------------
	private function protokol($obj,$key_id,$newvalue,$bef=array(),$osot='') {
		foreach($newvalue as $key=>$value) {
			$oldvalue=(!isset($bef[$key]))?'':$bef[$key];
			if (($key!='lastedit') and ($oldvalue!=$value)) {
//				$this->needfillnew=1;
				$log=new Log_edit;
				$log->obj=$obj;
				$log->osot=$osot;
				$log->field=$key;
				$log->key_id=$key_id;
				$log->oldvalue=$oldvalue;
				$log->newvalue=$value;
				$log->coper=Yii::app()->user->id;
				if(!$log->save()) ;
			} 
		}
}

//------------------------------------
}
?>