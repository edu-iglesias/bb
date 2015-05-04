<?php


class Accounts extends Eloquent {

	public $timestamps = true;
	 
	protected $table = 'accounts';

	protected $primaryKey ='account_number';
}
