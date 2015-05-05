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

	

	</head>

    <table border=0 width="100%">
        <tr>
            <td><h2></i><i class="fa fa-users"></i> Customers to Credit Account</h2></td>
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
    	<select class="form-control" id="ddlType" onchange="getCustomers()">
    		<option value="Credit">Credit</option>
    		<option value="Fixed">Fixed</option>
    	</select>
    </div>



    <div class="form-create col-md-12" id="divTableForCredit">
        <table  id="colvixTable" border=0 class="table table-bordered">
			        <thead>
			            <tr>
			                <th width="9%">Account Number</th>
			                <!-- <th width="9%">Pin Number</th> -->
			                <th width="11%">Name</th>
			                <!-- <th width="11%">Last Name</th> -->
			                <th width="11%">Email</th>
			                <th width="8%">Gender</th>
			                <th width="10%">Address</th>
			                <th width="9.5%">Contact</th>
			                <th width="8.5%">Balance</th>	
			                <th width="7.5%">Status</th>
			                <th width="9%">Date Created</th>
			                <th width="11%"></th>
			            </tr>
			        </thead>
			        <tbody>

			            @if(count($accountsCredit)==0)
			                <tr><td colspan="10" align="center">No Archives Found.</td></tr>
			            @endif

			            @foreach($accountsCredit as $accountsCredit)

			                <tr>
			                    <td>{{ $accountsCredit->id; }}</td>
			                    <!-- <td>{{ $accountsCredit->password; }}</td> -->
			                    <td>{{ $accountsCredit->last_name. "," .$accountsCredit->first_name; }}</td>			                   
			                    <td>{{ $accountsCredit->email }}</td>
			                    <td>{{ $accountsCredit->gender }}</td>
			                    <td>{{ $accountsCredit->address }}</td>
			                    <td>{{ $accountsCredit->contact }}</td>
			                    <td>{{ $accountsCredit->balance }}</td>		       
			                    <td align="center">@if($accountsCredit->status == 1) {{HTML::image('images/yes.png')}} 
			                    				   @else {{HTML::image('images/no.png')}} @endif</td>
			                    <td>{{ $accountsCredit->created_at }}</td>
			                    <td align="center">
			                    	<a href="/otc/customers/edit/{{$accountsCredit->id}}" class="btn btn-info">edit</a>
			                    	
			                    </td>
			                </tr>     

			            @endforeach
			        </tbody>
		    </table>
		</div>

		<script >
		function getCustomers()
		    {

		    	if($("#ddlType").val() == "Credit")
		    	{
		       		window.location.assign("/otc/customers");
		       	}
		       	else
		       	{
		       		window.location.assign("/otc/customersfixed")

		       	}

				
				
		       

		    }
 </script>

@stop
