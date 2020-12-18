<?php 
class UserIdentity extends CUserIdentity {
    private $_id;
    public function authenticate() {
    
        $record=Users::model()->findByAttributes(array('username'=>$this->username));

        if ($record===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
//        else if($record->password!==md5($this->password))
        else if ($record->password!==sha1(md5($this->username).md5($this->password))) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id=$record->id;
            $this->setState('name', $record->usernamerus);
            $this->setState('roles', ($record->pasp_edit)?'admin':'user');
            $this->errorCode=self::ERROR_NONE;
//			$record->lastlogin=date("Y-m-d H:i:s");
        }
        return !$this->errorCode;
    }

//--------------------------------------- 
    public function getId()     {
        return $this->_id;
    }

}