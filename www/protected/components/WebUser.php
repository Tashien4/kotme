<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
//  private $usernamerus;	
 
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getLogin(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->name;
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function isAdmin(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->only1) == 0;
//		return intval($user->admin) ;
	} else {
		return false;
	}
  }
  function isProgress(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->progerss);
//		return intval($user->usersadmin) ;
	} else {
		return false;
	}
  }
  function isProgressChar(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->character_rep);
//		return intval($user->usersadmin) ;
	} else {
		return false;
	}
  }
  
  function isUseradmin(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->usersadmin) == 1;
//		return intval($user->usersadmin) ;
	} else {
		return false;
	}
  }
/*
  function isPaspWriter(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->pasp_edit) == 1;
	} else {
		return false;
	}
  }

  function isReestrmaker(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->onereestronly) == 1;
	} else {
		return false;
	}
  }

  function isBls_Manager(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->bls_manager) == 1;
	} else {
		return false;
	}
  }

  function isMG_Manager(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->mungiliemanager) == 1;
	} else {
		return false;
	}
  }

  function isPrivat_Manager(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return intval($user->privatmanager) == 1;
	} else {
		return false;
	}
  }
*/ 
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Users::model()->findByPk($id);
        }
        return $this->_model;
    }
//-------------------------------------------------------
/*  function getDolg(){
	$user = $this->loadUser(Yii::app()->user->id);
	if ($user) {	
		return $user->dolg;
	} else {
		return '';
	}
  }
*/
//-------------------------------------------------------
}
?>