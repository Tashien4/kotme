<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    private $_id;
	private $_name;
	private $login;
	private $_admin;
 
	public function authenticate()
	{
		$this->login=$this->username;
$_SESSION['ms_error']=$this->login; 
		$obj=Users::model()->findByAttributes(array('login'=>$this->login));
		echo $this->login;
		if (!$obj)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
$_SESSION['ms_error'].='_find'; 
		}
		else if ($obj->password != sha1(md5($this->login).md5($this->password)))
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
$_SESSION['ms_error'].='_passw'; 
		}
		else
		{
			$this->_id = $obj->id;

			$this->setState('name', $obj->login);

			$this->errorCode=self::ERROR_NONE;
						$lastlogin=date("Y-m-d H:i:s");
					$obj->lastlogin=$lastlogin;
$_SESSION['ms_error'].='_noid'; 
 
		}
//print_r($obj); 
		return !$this->errorCode;
	}
//----------------------------------------------------------------- 
//	public function getDolg()    {
//	        return $this->_dolg;
//	}
//----------------------------------------------------------------- 
	public function getId()    {
	        return $this->_id;
	}
 
	public function getName()    {
		return $this->_name;
	}	

	public function getAdmin()    {
		return $this->_admin;
	}	
/*S
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.

	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
                else if($_SERVER['PHP_AUTH_USER'] == 'tabel') 
			$this->username='admin';
			$this->errorCode=self::ERROR_NONE;
                else if($_SERVER['PHP_AUTH_USER'] == 'kadry') 
			$this->username='РћС‚РґРµР» РєР°РґСЂРѕРІ';
			$this->errorCode=self::ERROR_NONE;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
*/
}