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
		                <th width="13%">Email</th>
		                <th width="13%">Name</th>
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
		                    <td>{{ $user->last_name . ', ' . $user->first_name . ' ' . $user->middle_name; }}</td>
		                    <td>{{ $user->gender }}</td>
		                    <td>{{ $user->contact }}</td>
		                    <td>@if($user->status == 1) Activated @else Deactivated @endif</td>
		                    <td>{{ $user->created_at }}</td>

		                    <td>
		                    
		                    	<a href="/otc/tellers/edit/{{ $user->id  }}" class="btn btn-info" data-toggle="tooltip" data-placement="top"  title="Edit User Information"><i class="fa fa-pencil-square-o"></i></a>
		                    	@if($user->status == 1)
		                        	<button class="btn btn-danger" type="button" data-toggle="modal" data-target="{{ '#deactivate_' . $user->id }}"  data-toggle="tooltip" data-placement="top"  title="Deactivate User"><i class="fa fa-ban"></i></button>
		                        @else
		                        	<button class="iframe btn btn-success" type="button" data-toggle="modal" data-target="{{ '#activate_' . $user->id }}"  data-toggle="tooltip" data-placement="top"  title="Activate User"><i class="fa fa-check"></i></button>
		                        @endif
		                    </td>
		                </tr>     

		            @endforeach
		        </tbody>
	    </table>
	</div>

    @foreach($users as $user)       

			<?php
				if($user->status == 1)
		        {
		            $modalTitle = "Deactivate";
		            $modalName = "deactivate";
		            $message = "Are you sure you want to deactivate this user account?";
		        }
	        	else
	        	{
	            	$modalTitle = "Activate";
	            	$modalName = "activate";
	            	$message = "Are you sure you want to activate this user account?";
	            }
	       ?>

	    	<div class="modal fade" id="{{ $modalName . '_' . $user->id }}" aria-hidden="true">
	       		<div class="modal-dialog">
	            	<div class="modal-content">
	                	<div class="modal-header">
	                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                    	<b style="color:black;">{{ $modalTitle }} User Account</b>
	                	</div>
	                	<div class="modal-body">
	                    	<font color="black">{{ $message }}</font>
	                	</div>
	                	<div class="modal-footer">
	                    	<button type="button" class="btn " data-dismiss="modal">Cancel</button>
	                    	<a href="/otc/tellers/{{ $modalName }}/{{$user->id}}" class="@if($user->status == 1) btn btn-warning @else btn btn-primary @endif" id="confirm">@if($user->status == 1) Deactivate @else Activate @endif</a>
	                </div>
	            </div>
	        </div>
	    </div>

	@endforeach

@stop
