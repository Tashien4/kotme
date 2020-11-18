<?php
class Task extends Activerecordlog
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
                return 'task';
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
             
   
	);
    }
//---------------------------------------
            public function attributeLabels() {
                return array(
 		  // 'fio'=> 'Сотрудник',
		
                );
            }    
//-------------------------------------
public function primaryKey() {
        return 'id';
    }

//---------------------------------------
}
?>