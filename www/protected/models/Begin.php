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
   /* public function relations()    {
	return array(
                
	);
    }*/
//---------------------------------------
            public function attributeLabels() {
                return array(
 		   //'fio'=> 'ФИО',
	

                );
            }    
//-------------------------------------
public function primaryKey() {
        return 'id';
    }

//----------------------------------------------------------------------------
public function getCharacterText($id) {
	$id=$id+1;
		$command=Yii::app()->db->createCommand("
			SELECT text
			FROM `character_replics`
			WHERE id=".$id);
		$urecords = $command->queryRow();
		return ($urecords['text']);
	
}	
//---------------------------------------
public function nextStep() {
	$id=Yii::app()->user->id;
	$command=Yii::app()->db->createCommand("
			update users
			set character_rep=character_rep+1,progerss=progerss+1
			WHERE id=".$id);
	$command->execute();
	
}
//---------------------------------------
//---------------------------------------
public function execJs_forme($tag) {
$js='<script>
var t=document.getElementById("'.$tag.'");
t.style.display="block";
</script>';

		return ($js);
	
}
//---------------------------------------
//---------------------------------------
public function giveMeLesson() {
	$id=Yii::app()->user->isProgressChar()+1;
	$command=Yii::app()->db->createCommand("
			SELECT *
			FROM task
			WHERE id=".$id);
		$urecords = $command->queryRow();
		return $urecords;
}
//---------------------------------------


	/*public function search($params=array()) {
		

		$criteria=new CDbCriteria;

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
	}*/
//---------------------------------------

//---------------------------------------
}
?>