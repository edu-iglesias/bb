<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

	protected $table = 'users';

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
