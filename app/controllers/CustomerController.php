<?php

class CustomerController extends BaseController {

	public function index()
	{
        $accounts = DB::table('accounts') 
         //->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('type','=','Credit')
         ->get();

        return View::make('otc.list_of_customers')->with('accounts',$accountsCredit);
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

}