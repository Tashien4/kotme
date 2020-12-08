<?php

class Begin extends Activerecordlog {

//---------------------------------------
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

//---------------------------------------
    public static function getData($className = __CLASS__) {
        return parent::model($className);
    }

//---------------------------------------
    public function tableName() {
        return 'begin';
    }

//---------------------------------------
    public function rules() {
        return array(
            array('id', 'length', 'max' => 50, 'message' => 'Ошибка 1'),
            array('text', 'length', 'max' => 1000, 'message' => 'Ошибка 2'),
        );
    }

//---------------------------------------
    /* public function relations()    {
      return array(

      );
      } */
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
        $id = $id + 1;
        $command = Yii::app()->db->createCommand("
			SELECT text
			FROM `character_replics`
			WHERE id=" . $id);
        $urecords = $command->queryRow();
        return ($urecords['text']);
    }

//---------------------------------------
    public function getMyAnswer($id) {
        $id_u = Yii::app()->user->id;
        $command = Yii::app()->db->createCommand("
			SELECT code
			FROM user_code
			WHERE user_id=" . $id_u . " and task=" . $id);
        $urecords = $command->queryRow();

        if ($urecords != NULL) {
            return $urecords["code"];
        } else {
            return "";
        }
    }

    // with parameters from post
    public function saveCode() {
        // https://stackoverflow.com/questions/19767894/warning-do-not-access-superglobal-post-array-directly-on-netbeans-7-4-for-ph
        $exercise = filter_input(INPUT_POST, 'exercise'); // номер упражнения
        $code = filter_input(INPUT_POST, 'code'); // исходный код, введеный пользователем
        $id = Yii::app()->user->id; // user id

        $savedCodeQuery = Yii::app()->db->createCommand();

        $savedCodeQuery->select("*")->from("user_code")->where("user_id=" . $id . " and task=" . $exercise);
        $savedCode = $savedCodeQuery->queryRow();

        if ($savedCode != NULL) {
            $saveCodeQuery = Yii::app()->db->createCommand("
			update user_code
			set code='" . $code . "'
			WHERE user_id=" . $id . " and task=" . $exercise);
            $saveCodeQuery->execute();
        } else {
            $saveCodeQuery = Yii::app()->db->createCommand();
            $saveCodeQuery->insert("user_code", array(
                'user_id' => $id,
                'task' => $exercise,
                "code" => $code
            ));
        }
    }

//---------------------------------------
    public function nextStep() {
        $exercise = filter_input(INPUT_POST, 'exercise'); // номер упражнения
        $id = Yii::app()->user->id; // user id

        $this->saveCode();
        $this->giveMeAchivment($exercise);
        $step1 = Yii::app()->db->createCommand("
			SELECT if((progerss+1)>" . $exercise . ",1,0) as stat
			FROM users
			WHERE id=" . $id);
        $s1 = $step1->queryRow();

        if ($s1['stat'] == 0) {
            $step2 = Yii::app()->db->createCommand("
			update users
			set character_rep=character_rep+1,progerss=progerss+1
			WHERE id=" . $id);
            $step2->execute();
        };
    }

//---------------------------------------
    public function giveMeAchivment($id) {
        $user_id = Yii::app()->user->id;
        
        if ($id == 10)
            $nom = 5;
        else if ($id == 9)
            $nom = 4;
        elseif ($id == 5)
            $nom = 3;
        elseif ($id > 1)
            $nom = 2;
        else
            $nom = 1;
        
        $sql = Yii::app()->db->createCommand("
        SELECT *
        FROM user_achivment
        where user_id=" . $user_id . " and achiv_id=" . $nom);
        $row = $sql->queryRow();

        if ($row == false) {
            $ss = Yii::app()->db->createCommand("
                insert user_achivment(user_id,achiv_id,date)
                values(" . $user_id . "," . $nom . ",'" . date('Y-m-d H:i:s') . "')");
            $ss->execute();
        }
    }

//---------------------------------------
    public function giveMeAllAch() {
        //$id=Yii::app()->user->isProgressChar()+1;
        $command = Yii::app()->db->createCommand("
        SELECT *
        FROM achivment
        ");
        $urecords = $command->queryAll();
        return $urecords;
    }

//---------------------------------------
//---------------------------------------
    public function My_Ach($nom) {
        $id = Yii::app()->user->id;
        $command = Yii::app()->db->createCommand("
        SELECT if(id=" . $nom . ",1,0) as yes
        FROM user_achivment
        where user_id=" . $id);
        $urecords = $command->queryRow();
        return $urecords['yes'];
    }

//---------------------------------------
//---------------------------------------
    public function giveMeLesson($id) {
        //$id=Yii::app()->user->isProgressChar()+1;
        $command = Yii::app()->db->createCommand("
			SELECT *
			FROM task
			WHERE id=" . $id);
        $urecords = $command->queryRow();
        return $urecords;
    }

//---------------------------------------


    /* public function search($params=array()) {


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
      } */
//---------------------------------------
//---------------------------------------
}

?>