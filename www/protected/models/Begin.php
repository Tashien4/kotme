<?php

const TestsSuccess = 1;
const ExecutionErrors = 2;
const TestsFail = 3;
const ServerError = 4;

/**
 * Main model
 *
 * @author tashien, zeganstyl
 */
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
			FROM character_replics
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
    public function saveCode($exercise, $code, $id) {
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
    
    public function checkExercise($exercise, $code, $id) {
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($_POST)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents('http://127.0.0.1:8888', false, $context);
        
        $resultJson = json_decode($result);

        if ($resultJson->status == TestsSuccess) {
            $this->saveCode($exercise, $code, $id);
            $this->nextStep($exercise, $id);

            //сделать запись кода пользователя

            $resultJson->message = "Отличное начало. Продолжай в том же духе!";
            return json_encode($resultJson);
        } else {
            return $result;
        }
    }

//---------------------------------------
    public function nextStep($exercise, $id) {
        $this->giveMeAchivment($exercise, $id);
        $step1 = Yii::app()->db->createCommand("
			SELECT *
			FROM users
			WHERE id=" . $id . " and (progerss+1 > " . $exercise . ")");
        $s1 = $step1->queryRow();

        if (empty($s1)) {
            $step2 = Yii::app()->db->createCommand("
			update users
			set character_rep=character_rep+1,progerss=progerss+1
			WHERE id=" . $id);
            $step2->execute();
        };
    }

//---------------------------------------
    public function giveMeAchivment($exercise, $id) {
        if ($exercise == 10)
            $nom = 5;
        else if ($exercise == 9)
            $nom = 4;
        elseif ($exercise == 5)
            $nom = 3;
        elseif ($exercise > 1)
            $nom = 2;
        else
            $nom = 1;
        
        $sql = Yii::app()->db->createCommand("
        SELECT *
        FROM user_achivment
        where user_id=" . $id . " and achiv_id=" . $nom);
        $row = $sql->queryRow();

        if ($row == false) {
            $ss = Yii::app()->db->createCommand("
                insert user_achivment(user_id,achiv_id,date)
                values(" . $id . "," . $nom . ",'" . date('Y-m-d H:i:s') . "')");
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