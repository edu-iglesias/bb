<?php

class TellerController extends BaseController {

	public function index()
	{
        $users = DB::table('users') 
         ->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('user_type','=','4')
         ->select('*', 'users.id','users.created_at')
         ->get();

        return View::make('otc.list_of_tellers')->with('users',$users);
	}

    public function create()
    {
        return View::make('otc.create_teller');
    }

    public function store()
    {
        $inputs = Input::all();

        $rules = array(     
            'email'    => 'Required|email|unique:users,email',
            'password'  =>'Required|min:5|Confirmed|max:20',
            'password_confirmation'=>'Required|min:5|max:20',
            'FirstName'     => 'Required|alpha_spaces|max:50',
            'LastName'     => 'Required|alpha_spaces|max:50',
            'MiddleName'     => 'Required|alpha_spaces|max:50',
            'ContactNumber' => 'Required|digits:10|numeric',
            'gender'  => 'Required|in:Male,Female,',
            'address'  => 'Required',
        );

        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $user = new User;
            $user->email = Input::get('email');
            $user->first_name = Input::get('FirstName');
            $user->last_name = Input::get('LastName');
            $user->middle_name = Input::get('MiddleName');
            $user->user_type = "4";
            $user->gender = Input::get('gender');
            $user->contact = Input::get('ContactNumber');
            $user->address = Input::get('address');
            $user->save();
            
            Session::put('success_user_created', "You have successfully added a new user.");
            return Redirect::back();

        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }

    public function edit($id)
    {
        $user = User::where('id','=',$id)
            ->where('user_type','=','4')
            ->first();

        if($user == null)
        {
            return Redirect::back();
        }

        Session::put('email', $user->email);
        Session::put('FirstName',$user->first_name);
        Session::put('LastName',$user->last_name);
        Session::put('MiddleName',$user->middle_name);
        Session::put('ContactNumber',$user->contact);
        Session::put('gender',$user->gender);
        Session::put('address',$user->address);

        return View::make('otc.edit_teller');
    }

    public function update($id)
    {

        $inputs = Input::all();

        $user = User::where('id','=',$id)
            ->where('user_type','=','4')
            ->first();

        if(Input::get('email') == $user->email)
        {
            $email_rule = '';
        }
        else
        {
            $email_rule = 'Required|email|unique:users,email';
        }

        if(Input::get('password') != "")
        {
            $password_rule = 'Required|min:5|Confirmed|max:20';
            $password_confirmation_rule = 'Required|min:5|max:20';
        }
        else
        {
            $password_rule = '';
            $password_confirmation_rule = '';
        }

        $rules = array(     
            'email'    => $email_rule,
            'password'  => $password_rule,
            'password_confirmation'=> $password_confirmation_rule,
            'FirstName'     => 'Required|alpha_spaces|max:50',
            'LastName'     => 'Required|alpha_spaces|max:50',
            'MiddleName'     => 'Required|alpha_spaces|max:50',
            'ContactNumber' => 'Required|digits:10|numeric',
            'gender'  => 'Required|in:Male,Female,',
            'address'  => 'Required',
        );

        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            Session::put('success_user_created', 'You have successfully edited the user information.');

            $user->email = Input::get('email');
            $user->first_name = Input::get('FirstName');
            $user->last_name = Input::get('LastName');
            $user->middle_name = Input::get('MiddleName');
            $user->user_type = "4";
            $user->gender = Input::get('gender');
            $user->contact = Input::get('ContactNumber');
            $user->address = Input::get('address');
            $user->save();

            return Redirect::to('/otc/tellers');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }

    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->update();
        Session::put('status', "You have successfully activated the user.");
        return Redirect::back();
    }


    public function deactivate($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->update();
        Session::put('status', "You have successfully deactivated the user.");
        return Redirect::back();
    }

    public function transactions()
    {
        return View::make('otc.tellers_transaction');
    }

    public function withdraw()
    {
        
        return View::make('otc.tellers_transaction_withdraw');
    }

    public function acceptWithdraw()
    {
        $inputs = Input::all();

        $rules = array(     
            'txtAccountNumber'    => 'Required|numeric',
            'txtAmount'  =>'Required|numeric',
        );

        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $accountNumber = Input::get('txtAccountNumber');
            $amount = Input::get('txtAmount');

            //$account = accounts::where('id','=',$accountNumber)->first();
            $account = accounts::find($accountNumber);

            if(count($account) == 0)
            {
                Session::put('message', "Account Number is wrong");
            }

            else if($amount > $account->balance)
            {

                Session::put('message', "The amount you wish to withdraw is greater than your account balance (PHP ". $account->balance .").");
            }

            else if($amount < 100)
            {

                Session::put('message', "The minimum amount for withdrawal is PHP 100");
            }

            else if($account->type == "Fixed")
            {
                
                $currentBalance = $account->balance - $amount;

                $transaction = new transaction;
                $transaction->account_number = Input::get('txtAccountNumber');
                $transaction->amount = Input::get('txtAmount');
                $transaction->transaction = "Withdrawal";
                $transaction->total_balance = $currentBalance;
                $transaction->save();

                
                $account->status = 0;
                $account->save();

                Session::put('message', "Account closed. This is a fixed account.");

            }


            else
            {
                $currentBalance = $account->balance - $amount;    

                //dd($currentBalance);

                $transaction = new transaction;
                $transaction->account_number = Input::get('txtAccountNumber');
                $transaction->amount = Input::get('txtAmount');
                $transaction->transaction = "Withdrawal";
                $transaction->total_balance = $currentBalance;
                $transaction->save();

                
                $account->balance = $currentBalance;
                $account->save();

                Session::put('message', "Successfully withdraw, current balance is (PHP ". $currentBalance .").");

            }

            return Redirect::back();
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }

    public function checkAccount($accountNumber)
    {
        if($accountNumber == 0)
        {
            Session::put('message', "Account Number is REQUIRED!");
            return Redirect::back();
        }

        else
        {
             // $account = DB::table('accounts') 
             // ->where('id','=', $accountNumber)
             // ->first();

            $account = accounts::find($accountNumber);

            if(count($account)==0)
            {

                Session::put('message', "Account Number Not Found!");

            }

            else
            {

             Session::put('message', "Name: ". $account->last_name . "," . $account->first_name
                            . "<br> Type: ". $account->type
                            . "<br> Current Balance: PHP ". $account->balance);
            }

            return Redirect::back();
        }
    }

    public function deposit()
    {
        
        return View::make('otc.tellers_transaction_deposit');
    }

    public function acceptDeposit()
    {
        $inputs = Input::all();

        $rules = array(     
            'txtAccountNumber'    => 'Required|numeric',
            'txtAmount'  =>'Required|numeric',
        );

        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $accountNumber = Input::get('txtAccountNumber');
            $amount = Input::get('txtAmount');

            //$account = accounts::where('id','=',$accountNumber)->first();

            $account = accounts::find($accountNumber);


            if(count($account) == 0)
            {
                Session::put('message', "Account Number is wrong");
            }

            else if($amount < 500)
            {

                Session::put('message', "The minimum amount for deposit is PHP 500");
            }

            else
            {
                $currentBalance = $account->balance + $amount;

                $transaction = new transaction;
                $transaction->account_number = Input::get('txtAccountNumber');
                $transaction->amount = Input::get('txtAmount');
                $transaction->transaction = "Deposit";
                $transaction->total_balance = $currentBalance;
                $transaction->save();

                
                $account->balance = $currentBalance;
                $account->save();

                Session::put('message', "Successfully deposit, current balance is (PHP ". $currentBalance .").");

            }


            
            return Redirect::back();

        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }
}