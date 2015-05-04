@extends('layouts.default')

@section('content')

    <table border=0 width="100%">
        <tr>
            <td><h2></i><i class="fa fa-users"></i> Tellers</h2></td>
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

    <div class="form-create col-md-12" >
        <table  id="colvixTable" border=0 class="table table-bordered">
			        <thead>
			            <tr>
			                <th width="13%">Email</th>
			                <th width="13%">First Name</th>
			                <th width="13%">Last Name</th>
			                <th width="13%">Middle Name</th>
			                <th width="9%">Gender</th>
			                <th width="12%">Contact</th>
			                <th width="8%">Status</th>
			                <th width="10%">Date Created</th>
			                <th width="9%">Action</th>
			            </tr>
			        </thead>
			        <tbody>

			            @if(count($users)==0)
			                <tr><td colspan="6" align="center">No Archives Found.</td></tr>
			            @endif

			            @foreach($users as $user)

			                <tr>
			                    <td>{{ $user->email; }}</td>
			                    <td>{{ $user->first_name; }}</td>
			                    <td>{{ $user->last_name; }}</td>
			                    <td>{{ $user->middle_name; }}</td>
			                    <td>{{ $user->gender }}</td>
			                    <td>{{ $user->contact }}</td>
			                    <td>@if($user->status == 1) Activated @else Deactivated @endif</td>
			                    <td>{{ $user->created_at }}</td>
			                    <td>action here</td>
			                </tr>     

			            @endforeach
			        </tbody>
		    </table>

@stop
