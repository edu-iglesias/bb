@extends('layouts.atm_default')
@section('content')

	<div class="form-create col-md-12">
		<div class="forms col-md-12">
			{{ Form::open() }}
			<div class="forms col-md-12">
			<h3>Withdraw</h3>
			<hr>

			@if(Session::get('success_user_created'))
		      	<div class="alert alert-success fade in" role="alert">
		        	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		        	<center>{{ Session::get('success_user_created') }}</center>
		      	</div>
		      	{{ Session::forget('success_user_created') }}
	    	@endif
			
			
			<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('amount')) has-error @endif">
		       	{{ Form::text('amount','', array('class' => 'form-control', 'placeholder' => 'Amount to Withdraw','maxlength'=>'5')) }}
		        @if ($errors->has('amount')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('amount') }}</p></i> @endif
		    </div>
			</div>
		   
			<div class="forms col-md-12">
			<div class="col-md-3 ">
		            {{ Form::submit('Submit', ['id'=>'submit','class' => 'btn btn-lg btn-success btn-block sbmt left-sbs','style'=>'width:40%; float:left;']) }}
		    </div>
		    {{Form::close() }}
		</div>
		</div>
			
		</div>
	</div>
	
@stop