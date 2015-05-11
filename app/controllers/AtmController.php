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

	public function passbookChangeDate()
	{
		$start = date('Y-m-d', strtotime(Input::get('start')));
        $end = date('Y-m-d', strtotime(Input::get('end')));
        $date_today = date('Y-m-d');
  
        $end = date('Y-m-d',strtotime($end . "+1 days"));

		$transactions = Transaction::whereBetween('transactions.created_at', array($start, $end))
            ->join('accounts','transactions.account_number','=','accounts.id')
            ->where('transactions.account_number','=', Session::get('user_account_number'))
            ->select('*', 'transactions.created_at')
            ->get();

		return View::make('atm.passbook')
			->with('transactions',$transactions);

	}
}