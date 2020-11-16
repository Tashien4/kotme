<?php
 
class RegistrationForm extends CFormModel
{
	public $username;
	public $usernamerus;
    public $login;
    public $password;
    public $password2;
    public $admin;
    public $spiusers;

	private $_identity;

 
    public function rules()
    {
        return array(
            array('usernamerus, password, password2, username', 'required'),
//            array('email', 'email'),
            array('username', 'isUserUniqie'),
            array('password', 'comparePasses'),
        );
    }
 
	public function attributeLabels()
	{
		return array(
			'usernamerus' => 'Полное ФИО',
			'username' => 'Работает',
//			'login' => 'Логин',
			'password' => 'Пароль',
			'password2' => 'Повторите пароль',
			'admin' => 'Статус прав',
		);
	}
 
	protected function beforeValidate()
	{
//		$this->username = $this->username;
		$this->username = strtolower($this->username);
		return true;
	}
 
	public function isUserUniqie($attribute,$params)
	{
		$ret=true;
		$obj=Users::model()->findByAttributes(array('username'=>$this->username));
		if ($obj) {
			$this->addError('login', 'Такой пользователь уже существует.');
			$ret=false;
		}
		return $ret;
	}
 
	public function comparePasses($attribute,$params)
	{
		if ($this->password != $this->password2)
		{
			$this->addError('password', 'Введёные пароли не совпадают.');
		}
	}

	public function spisokusers($params=0)
	{
		$urecords=Users::model()->findAll();
		$this->spiusers=array();
//print_r($urecords);
		foreach($urecords as $row )
		{
			$this->spiusers[$row['username']]=$row['usernamerus'];
		}
		return $this->spiusers;
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
//			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			$duration=3600*24*1; // 1 day
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}

	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}


}