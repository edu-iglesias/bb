@extends('layouts.default')

@section('content')

	<script >
		
		 //    $(function () {
    			
   //  			$('#divSpanDate').hide();

			// });


	</script>


	<h2>Transactions for Deposit</h2>
	<hr>

	@if(Session::get('message'))
      	<div class="alert alert-success fade in" role="alert">
        	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        	<center>{{ Session::get('message') }}</center>
      	</div>
      	{{ Session::forget('message') }}
    @endif

	<div class="form-create col-md-12">

		{{ Form::open() }}


		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtAccountNumber')) has-error @endif">
		        {{ Form::text('txtAccountNumber', '',array('class' => 'form-control', 'placeholder' => 'Account Number','maxlength'=>'10', 'id' => 'txtAccountNumber')) }} 
		        @if ($errors->has('txtAccountNumber')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtAccountNumber') }}</p></i> @endif
		    </div>
		</div>	

		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtAmount')) has-error @endif">
		       	{{ Form::text('txtAmount', '',array('class' => 'form-control', 'placeholder' => 'Amount','maxlength'=>'50')) }}
		        @if ($errors->has('txtAmount')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtAmount') }}</p></i> @endif
		    </div>
		</div>	

		<div class="forms col-md-12">
			<div class="col-md-4 ">
		            {{ Form::submit('Ok', ['id'=>'submit','class' => 'btn btn-success','style'=>'width:20%;']) }}

		            <a class="btn btn-primary" onclick="GetAccountInfo()">Check Account</a>
		            <a class="btn btn-default" href="/otc/transactions/">Cancel</a>
		    </div>
		</div> 

		{{ Form::close(); }}

	</div>

	<script >
		function GetAccountInfo()
		    {

		    	//alert("/otc/tellers/checkAccount/" + $("#txtAccountNumber").val());

		    	if($("#txtAccountNumber").val() == "")
		    		window.location.assign("/otc/transactions/checkAccount/0");
		    	else
		    		window.location.assign("/otc/transactions/checkAccount/" + $("#txtAccountNumber").val());

		    }
 </script>
@stop
