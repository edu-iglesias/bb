@extends('layouts.default')

@section('content')

	<head>
		<style>
			table
			{
			font-family:sans-serif;
			font-size:8pt;
			}
		</style>

		<script >
		
		    $(function () {
    			
    			$('#divTableForCredit').hide();

			});


	</script>

	</head>

    <table border=0 width="100%">
        <tr>
            <td><h2></i><i class="fa fa-users"></i> Customes</h2></td>
            <td align="right"><a href="/otc/customers/create" class="btn btn-success" ><i class="fa fa-user-plus"></i> Create Customer Account</a></td>
        </tr>
    </table>
    

    <hr>

    @if(Session::get('status'))
        <div class="alert alert-success fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <center>{{ Session::get('status') }}</center>
        </div>
        {{ Session::forget('status') }}
    @endif

    <div class="form-create col-md-12">
    	Choose Type
    </div>



    <div class="form-create col-md-12" id="divTableForCredit">
        <table  id="colvixTable" border=0 class="table table-bordered">
			        <thead>
			            <tr>
			                <th width="9%">Account Number</th>
			                <th width="9%">Pin Number</th>
			                <th width="11%">Name</th>
			                <!-- <th width="11%">Last Name</th> -->
			                <th width="11%">Email</th>
			                <th width="8%">Gender</th>
			                <th width="10%">Address</th>
			                <th width="9.5%">Contact</th>
			                <th width="8.5%">Balance</th>	
			                <th width="6.5%">Type</th>			                
			                <th width="6.5%">Life Span</th>
			                <th width="7.5%">Status</th>
			                <th width="9%">Date Created</th>
			                <th width="11%"></th>
			            </tr>
			        </thead>
			        <tbody>

			            @if(count($accounts)==0)
			                <tr><td colspan="12" align="center">No Archives Found.</td></tr>
			            @endif

			            @foreach($accounts as $accounts)

			                <tr>
			                    <td>{{ $accounts->account_number; }}</td>
			                    <td>{{ $accounts->pin_number; }}</td>
			                    <td>{{ $accounts->last_name. "," .$accounts->first_name; }}</td>
			                    <!-- <td>{{ $accounts->last_name; }}</td> -->
			                    <td>{{ $accounts->email }}</td>
			                    <td>{{ $accounts->gender }}</td>
			                    <td>{{ $accounts->address }}</td>
			                    <td>{{ $accounts->contact }}</td>
			                    <td>{{ $accounts->balance }}</td>	
			                    <td>{{ $accounts->type }}</td>	
			                    <td>{{ $accounts->life_span }}</td>		       
			                    <td align="center">@if($accounts->status == 1) {{HTML::image('images/yes.png')}} 
			                    				   @else {{HTML::image('images/no.png')}} @endif</td>
			                    <td>{{ $accounts->created_at }}</td>
			                    <td>
			                    	<a href="" class="btn btn-info">edit</a>
			                    	
			                    </td>
			                </tr>     

			            @endforeach
			        </tbody>
		    </table>
		</div>

		<div class="form-create col-md-12" id="divTableForFixed">
        <table  id="colvixTable" border=0 class="table table-bordered">
			        <thead>
			            <tr>
			                <th width="9%">Account Number</th>
			                <th width="9%">Pin Number</th>
			                <th width="11%">Name</th>
			                <!-- <th width="11%">Last Name</th> -->
			                <th width="11%">Email</th>
			                <th width="8%">Gender</th>
			                <th width="10%">Address</th>
			                <th width="9.5%">Contact</th>
			                <th width="8.5%">Balance</th>	
			                <th width="6.5%">Type</th>			                
			                <th width="6.5%">Life Span</th>
			                <th width="7.5%">Status</th>
			                <th width="9%">Date Created</th>
			                <th width="11%"></th>
			            </tr>
			        </thead>
			        <tbody>

			            @if(count($accounts)==0)
			                <tr><td colspan="12" align="center">No Archives Found.</td></tr>
			            @endif

			            @foreach($accounts as $accounts)

			                <tr>
			                    <td>{{ $accounts->account_number; }}</td>
			                    <td>{{ $accounts->pin_number; }}</td>
			                    <td>{{ $accounts->last_name. "," .$accounts->first_name; }}</td>
			                    <!-- <td>{{ $accounts->last_name; }}</td> -->
			                    <td>{{ $accounts->email }}</td>
			                    <td>{{ $accounts->gender }}</td>
			                    <td>{{ $accounts->address }}</td>
			                    <td>{{ $accounts->contact }}</td>
			                    <td>{{ $accounts->balance }}</td>	
			                    <td>{{ $accounts->type }}</td>	
			                    <td>{{ $accounts->life_span }}</td>		       
			                    <td align="center">@if($accounts->status == 1) {{HTML::image('images/yes.png')}} 
			                    				   @else {{HTML::image('images/no.png')}} @endif</td>
			                    <td>{{ $accounts->created_at }}</td>
			                    <td>
			                    	<a href="" class="btn btn-info">edit</a>
			                    	
			                    </td>
			                </tr>     

			            @endforeach
			        </tbody>
		    </table>
		</div>

@stop
