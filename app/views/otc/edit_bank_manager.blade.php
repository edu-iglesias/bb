@extends('layouts.default')

@section('content')


	<h2> Edit a Bank Manager User</h2>
	<hr>

	
	<div class="form-create col-md-12">

		{{ Form::open() }}
		
		@if(Session::get('success_user_created'))
	      	<div class="alert alert-success fade in" role="alert">
	        	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	        	<center>{{ Session::get('success_user_created') }}</center>
	      	</div>
	      	{{ Session::forget('success_user_created') }}
	    @endif


		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('email')) has-error @endif">
		        {{ Form::text('email',Session::get('email'),array('class' => 'form-control', 'placeholder' => 'Email','maxlength'=>'50')) }}
		        @if ($errors->has('email')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('email') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('password')) has-error @endif">
		       	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password','maxlength'=>'20')) }}
		        @if ($errors->has('password')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('password') }}</p></i> @endif
		    </div>
		    <div class="col-md-3 form-group @if ($errors->has('password_confirmation')) has-error @endif">
		        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Re-Type Password')) }}
		    </div> 
		</div>

		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('FirstName')) has-error @endif">
		        {{ Form::text('FirstName',Session::get('FirstName'),array('class' => 'form-control', 'placeholder' => 'First Name','maxlength'=>'50')) }}
		        @if ($errors->has('FirstName')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('FirstName') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('LastName')) has-error @endif">
		        {{ Form::text('LastName',Session::get('LastName'),array('class' => 'form-control', 'placeholder' => 'Last Name','maxlength'=>'50')) }}
		        @if ($errors->has('LastName')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('LastName') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('MiddleName')) has-error @endif">
		        {{ Form::text('MiddleName',Session::get('MiddleName'),array('class' => 'form-control', 'placeholder' => 'Middle Name','maxlength'=>'50')) }}
		        @if ($errors->has('MiddleName')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('MiddleName') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('gender')) has-error @endif">
		            {{ Form::select('gender', [''=>'Choose a Gender','Male' => 'Male', 'Female' => 'Female'], Session::get('gender'), ['class'=>'form-control'] ); }}
		            @if ($errors->has('gender')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('gender') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('ContactNumber')) has-error @endif">
		        {{ Form::text('ContactNumber',Session::get('ContactNumber'),array('class' => 'form-control', 'placeholder' => 'Contact No.','maxlength'=>'10', 'minlength'=>'10')) }}
		        @if ($errors->has('ContactNumber')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('ContactNumber') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-6 form-group @if ($errors->has('address')) has-error @endif">
		        {{ Form::text('address',Session::get('address'),array('class' => 'form-control', 'placeholder' => 'Address','maxlength'=>'100')) }}
		        @if ($errors->has('address')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('address') }}</p></i> @endif
		    </div>
		</div>


		<div class="forms col-md-12">
			<div class="col-md-6 form-group ">
		            {{ Form::submit('Submit', ['id'=>'submit','class' => 'btn btn-lg btn-success btn-block sbmt left-sbs','style'=>'width:40%; float:right;']) }}
		    </div>
		</div>

		{{ Form::close(); }}

	</div>

	{{ Session::forget('email'); }}
	{{	Session::forget('FirstName'); }}
	{{	Session::forget('LastName'); }}
	{{	Session::forget('MiddleName'); }}
	{{	Session::forget('ContactNumber'); }}
	{{	Session::forget('gender'); }}
	{{	Session::forget('address'); }}


@stop