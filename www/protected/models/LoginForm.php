<?php


class LoginForm extends CFormModel
{
	public $login;
	public $password;
	public $name;
	public $email;
	public $rememberMe;
    	public $spiusers;
       // public $lastlogin;
	private $_identity;

	public function rules()
	{
		return array(

			array('login, password', 'required'),
			array('name','length', 'max'=>50,'message'=>'Не длинее 50 символов'),
			array('email','email'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'login'=>'Логин',
			'password'=>'Пароль',
			'rememberMe'=>'Напомнить позднее',
		);
	}


	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{	
			$this->_identity=new UserIdentity($this->login,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Пароль или логин введен неверно.');
		}
	}

	
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->login,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
// Yii::app()->getSession()->destroy(); 
			Yii::app()->user->login($this->_identity,$duration);

			return true;
		}
		else
			return false;
	}

	public function spisokusers($params=0)
	{
		$urecords=Users::model()->findAll();
		$this->spiusers=array();
		foreach($urecords as $row )
		{
			$this->spiusers[$row['name']]=$row['name'];
		}
		return $this->spiusers;
	}

}
