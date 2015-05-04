
<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Accounts extends Eloquent implements UserInterface, RemindableInterface {
    

    public $timestamps = true;
	 
	protected $table = 'accounts';

    public function getAuthIdentifier()
	{
	    return $this->getKey();
	}

	public function getAuthPassword()
	{
	    return $this->password;
	}

	public function getReminderEmail()
	{
	    return $this->email;
	}

		public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	protected $hidden = array('password', 'remember_token');

}