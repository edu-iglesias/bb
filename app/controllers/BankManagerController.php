<?php

class BankManagerController extends BaseController {
	  
	public function auditTrail()
	{
		$transactions = DB::table('transactions')
			->join('accounts','transactions.account_number','=','accounts.id')
			->get();
		
		return View::make('otc.list_of_transactions')
			->with('transactions',$transactions);
	}

}