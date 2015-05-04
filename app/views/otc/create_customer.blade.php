@extends('layouts.default')

@section('content')

	<script >
		
		    $(function () {
    			
    			$('#divSpanDate').hide();

			});


	</script>


	<h2>Create Customer Account</h2>
	<hr>

	@if(Session::get('success_customer_created'))
      	<div class="alert alert-success fade in" role="alert">
        	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        	<center>{{ Session::get('success_customer_created') }}</center>
      	</div>
      	{{ Session::forget('success_customer_created') }}
    @endif

	<div class="form-create col-md-12">

		{{ Form::open() }}


		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtPinNumber')) has-error @endif">
		       	{{ Form::text('txtPinNumber', '',array('class' => 'form-control', 'placeholder' => 'Pin Number','maxlength'=>'50')) }}
		        @if ($errors->has('txtPinNumber')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtPinNumber') }}</p></i> @endif
		    </div>
		</div>	
		
		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtFname')) has-error @endif">
		       	{{ Form::text('txtFname', '',array('class' => 'form-control', 'placeholder' => 'First Name','maxlength'=>'50')) }}
		        @if ($errors->has('txtFname')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtFname') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtLname')) has-error @endif">
		       	{{ Form::text('txtLname', '',array('class' => 'form-control', 'placeholder' => 'Last Name','maxlength'=>'50')) }}
		        @if ($errors->has('txtLname')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtLname') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtEmail')) has-error @endif">
		       	{{ Form::text('txtEmail', '',array('class' => 'form-control', 'placeholder' => 'Email','maxlength'=>'50')) }}
		        @if ($errors->has('txtEmail')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtEmail') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			
			<div class="col-md-3">
				<select id="ddlGender" name="ddlGender" class="form-control">
                     
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                   
                </select>
		    </div>
		    <input type="hidden" id="selected" name="selected" value="1"/>
		 </div>

		<div class="forms col-md-12" style="margin-top:15px">
			<div class="col-md-3 form-group @if ($errors->has('txtContact')) has-error @endif">
		       	{{ Form::text('txtContact', '',array('class' => 'form-control', 'placeholder' => 'Contact Number','maxlength'=>'11')) }}
		        @if ($errors->has('txtContact')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtContact') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-3 form-group @if ($errors->has('txtBalance')) has-error @endif">
		       	{{ Form::text('txtBalance', '',array('class' => 'form-control', 'placeholder' => 'Initial Balance','maxlength'=>'50')) }}
		        @if ($errors->has('txtBalance')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtBalance') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			
			<div class="col-md-3">
				<select id="ddlType" name="ddlType" class="form-control" onchange="getFixedAccountInfo()">
                     
                    <option value="">Select Type</option>
                    <option value="Fixed">Fixed</option>
                    <option value="Credit">Credit</option>
                   
                </select>

		    </div>
		    <!-- <input type="hidden" id="selectedType" name="selectedType" value="1"/> -->
		 </div>


		<div class="forms col-md-12" style="margin-top:15px" id="divSpanDate">
			<div class="col-md-3 form-group @if ($errors->has('txtLifeSpanDate')) has-error @endif">
		       	<input type='Date' class="form-control" id="txtDateSpan" name="txtDateSpan"> 
		    </div>
		</div>

		 <div class="forms col-md-12" style="margin-top:15px">
			<div class="col-md-3 form-group @if ($errors->has('txtAddress')) has-error @endif">
		       	{{ Form::text('txtAddress', '',array('class' => 'form-control', 'placeholder' => 'Address','maxlength'=>'250')) }}
		        @if ($errors->has('txtAddress')) <i><p class="help-block" style="margin-left:5px">{{ $errors->first('txtAddress') }}</p></i> @endif
		    </div>
		</div>

		<div class="forms col-md-12">
			<div class="col-md-4 ">
		            {{ Form::submit('Submit', ['id'=>'submit','class' => 'btn btn-lg btn-success btn-block sbmt left-sbs','style'=>'width:40%; float:right;']) }}
		    </div>
		</div> 

		{{ Form::close(); }}

	</div>

	<script >
		function getFixedAccountInfo()
		    {

		    	if($("#ddlType").val() == "Fixed")
		       		$('#divSpanDate').show();

				else
					$('#divSpanDate').hide();
		       

		    }
 </script>
@stop
