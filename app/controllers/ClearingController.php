<?php

class ClearingController extends BaseController {

	function CheckAccounts()
	{

		$date = date('Y-m-d');

		$ctr = 0;

		$clearing_day = DB::table('clearing_day') 
         ->where('created_at','like', '%'.$date.'%')
         ->get();

		if (count($clearing_day) > 0) 
		{
			$name = Session::get('user_first_name') . ' ' .Session::get('user_last_name');

			Session::put('msg', $name. ' already cleared all the accounts for this month');
		}

		else
		{

			$accounts = DB::table('accounts') 
	       	 ->where('type','=','Credit')
	         ->get();


			foreach($accounts as $accounts2)
			{
				$accountNumber = $accounts2->id;
				$accountUpdate = accounts::find($accountNumber);

				if($accounts2->balance == 0)
				{
					$accountUpdate->status = 0;
				
				}
				else if($accounts2->balance < 10000)
				{
					$balance = $accounts2->balance - 300;
					$accountUpdate->balance = $balance;
				}
				else if($accounts2->balance < 300)
				{
					$balance = $accounts2->balance - 300;
					$accountUpdate->balance = $balance;
					$accountUpdate->status = 0;
				}

	            $accountUpdate->save();

	            $ctr++;

			}


			$clearing_day = new ClearingDay;
			$clearing_day->cleared_by = Session::get('user_last_name') . ',' .Session::get('user_first_name');
			$clearing_day->save();

			Session::put('ctr', $ctr);



		}



		return Redirect::back();
	}
	
}
