<?php

class AtmController extends BaseController {

	public function passbook()
	{
		$transactions = DB::table('transactions')
			->join('accounts','transactions.account_number','=','accounts.id')
			->where('transactions.account_number','=', Session::get('user_account_number'))
			->select('*', 'transactions.created_at')
			->get();

		return View::make('atm.passbook')
			->with('transactions',$transactions);
	}
}