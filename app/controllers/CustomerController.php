<?php

class CustomerController extends BaseController {

	public function index()
	{
        $accountsCredit = DB::table('accounts') 
         //->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('type','=','Credit')
         ->get();

        return View::make('otc.list_of_customers')->with('accountsCredit',$accountsCredit);
        										  
	}

	public function customerFixed()
	{

         $accountsFixed = DB::table('accounts') 
         //->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('type','=','Fixed')
         ->get();

        return View::make('otc.list_of_customersfixed')->with('accountsFixed',$accountsFixed);
        										  
	}

	public function create()
	{
        

        return View::make('otc.create_customer');
	}

	public function store()
	{
		$inputs = Input::all();

		$rules = array(		
			// 'txtAccountNumber'    => 'Required|numeric',
			'txtPinNumber'  =>'Required',
			'txtFname'  =>'Required',
			'txtLname'  =>'Required',
			'txtEmail'  =>'Required',
			'ddlGender'  =>'Required',
			'txtContact'  =>'Required|numeric',
			'txtBalance'  =>'Required|numeric',
			'ddlType'  =>'Required',
			'txtAddress'  =>'Required',
        	// 'author'=>'Required|max:70',
			
		);

		$validationResult = Validator::make($inputs, $rules);

		if ( $validationResult->passes() ) 
		{
			$accounts = new Accounts;
			$accounts->pin_number = Input::get('txtPinNumber');
			$accounts->first_name = Input::get('txtFname');
			$accounts->last_name = Input::get('txtLname');
			$accounts->email = Input::get('txtEmail');
			$accounts->gender = Input::get('ddlGender');
			$accounts->contact = Input::get('txtContact');
			$accounts->balance = Input::get('txtBalance');
			$accounts->type = Input::get('ddlType');
			$accounts->life_span = Input::get('txtDateSpan');
			$accounts->address = Input::get('txtAddress');

			// $book->quantity = Input::get('quantity');
			// $book->category_categoryID = Input::get('selected');
			// $book->author = Input::get('author');
			
			$accounts->save();

			

            Session::put('success_customer_created', "You have successfully created a new account.");
            return Redirect::back();

		}
		else
		{
			//return Input::get('password') . " " . Input::get("password_confirmation");
			//return $messages = $validationResult->getMessages()->all();
			return Redirect::back()->withInput()->withErrors($validationResult);
		}
	}

	public function edit($accountNumber)
	{
      

        $account = DB::table('accounts') 
         //->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('account_number','=', $accountNumber)
         ->first();

        return View::make('otc.edit_customer')->with('account',$account);
	}

	public function update($accountNumber)
    {
    	$inputs = Input::all();

    	// $account = DB::table('accounts') 
     //     ->where('account_number','=', $accountNumber)
     //     ->get();
	    
    	$account = accounts::where('account_number','=',$accountNumber)->first();

    	$rules = array(		
			'txtPinNumber'  =>'Required',
			'txtFname'  =>'Required',
			'txtLname'  =>'Required',
			'txtEmail'  =>'Required',
			'ddlGender'  =>'Required',
			'txtContact'  =>'Required|numeric',
			'txtBalance'  =>'Required|numeric',
			'ddlType'  =>'Required',
			'txtAddress'  =>'Required',
		);


		$validationResult = Validator::make($inputs, $rules);

		if ( $validationResult->passes() ) 
		{


			$account->pin_number = Input::get('txtPinNumber');
			$account->first_name = Input::get('txtFname');
			$account->last_name = Input::get('txtLname');
			$account->email = Input::get('txtEmail');
			$account->gender = Input::get('ddlGender');
			$account->contact = Input::get('txtContact');
			$account->balance = Input::get('txtBalance');
			$account->type = Input::get('ddlType');
			$account->life_span = Input::get('txtDateSpan');
			$account->address = Input::get('txtAddress');
			
			$account->save();

	        
			if(Input::get('ddlType') == "Credit")
	        	return Redirect::to('/otc/customers');
	        else
	        	return Redirect::to('/otc/customersfixed');
	    }
	    else
	    {
	    	return Redirect::back()->withInput()->withErrors($validationResult);
	    }
	}

}