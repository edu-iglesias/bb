@extends('layouts.default')

@section('content')
	<h2> Profile Information </h2>

		<div class="form-create col-md-6" >
			<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Name</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ Session::get('user_first_name') . ' ' . $user->middle_name . ' ' . Session::get('user_last_name') }}" disabled>
		    		</div>
		  		</div>
		  	</div>

	  		<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Email</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $user->email }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Gender</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $user->gender }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Contact No.</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ '+63' . $user->contact }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<?php
			  	if($user->user_type == 1)
			  	{
			  		$usertype = 'Admin';
			  	}
			  	else if( $user->user_type == 2 )
			  	{
			  		$usertype = 'Bank Manager';
			  	}
			  	else if( $user->user_type == 3 )
			  	{
			  		$usertype = 'Bank Assitant';
			  	}
			  	else
			  	{
			  		$usertype = 'Teller';
			  	}
		  	?>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Position</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $usertype }}" disabled>
		    		</div>
		  		</div>
		  	</div>

		  	<div class="col-md-12">
				<div class="form-group col-md-6">
		    		<div class="input-group">
		      			<div class="input-group-addon">Address</div>
		      			<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" value="{{ $user->address }}" disabled>
		    		</div>
		  		</div>
		  	</div>



		</div>




@stop
