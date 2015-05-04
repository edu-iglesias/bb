@extends('layouts.default')

@section('content')

    <table border=0 width="100%">
        <tr>
            <td><h2></i><i class="fa fa-users"></i>List of Tellers</h2></td>
            <td align="right"><a href="/otc/tellers/create" class="btn btn-success" ><i class="fa fa-user-plus"></i> Add Teller</a></td>
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

    @if(Session::get('success_user_created'))
        <div class="alert alert-success fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <center>{{ Session::get('success_user_created') }}</center>
        </div>
        {{ Session::forget('success_user_created') }}
    @endif

    <div class="form-create col-md-12" >
        <table  id="colvixTable" border=0 class="table table-bordered">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Account No.</th>
		                <th>Transaction</th>
		                <th>Amount</th>
		                <!-- <th>Total Balance</th> -->
		                <th>Date</th>
		            </tr>
		        </thead>
		        <tbody>

		            @if(count($transactions)==0)
		                <tr><td colspan="7" align="center">No Transaction Found.</td></tr>
		            @endif

		            @foreach($transactions as $trans)

		                <tr>
		                    <td>{{ $trans->last_name . ', ' . $trans->first_name  }}</td>
		                    <td>{{ $trans->account_number }}</td>
		                    <td>{{ $trans->transaction }}</td>
		                    <td>{{ $trans->amount }}</td>
		               <!--      <td>{{ $trans->amount }}</td> -->
		                    <td>{{ $trans->created_at }}</td>

		                </tr>     

		            @endforeach
		        </tbody>
	    </table>
	</div>


@stop
