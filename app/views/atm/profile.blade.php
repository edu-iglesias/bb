@extends('layouts.atm_default')

@section('content')
	<h2> Profile Information </h2>

	<div class="form-create col-md-12">
	
	 <?php $user = DB::table('accounts')->where('id', Auth::customer()->get()->id)->get(); ?>
	
		<div class="form col-md-12">
			<div class="col-md-6 form-group">
			
			@foreach($user as $u1)
		       <p>First Name:<span style="margin-left:5px">{{$u1->first_name }}</span></p>
		       <p>Last Name:<span style="margin-left:5px; margin-right:5px">{{$u1->last_name }}</p>
		       
		       @if($u1->contact != null)
		       <p>Contact No:<span style="margin-left:5px; margin-right:5px">{{$u1->contact }}</p>
		       @else
		       <p>Contact No:<span style="margin-left:5px; margin-right:5px">None</p>
		       @endif

		       <p>Gender:<span style="margin-left:5px; margin-right:5px">{{$u1->gender }}</p>
		       
		        @endforeach
		      
		   <hr>
		    <div style="margin-top:8px">
			<h3>Account</h3>
			<hr>
			 @foreach($user as $u)
		       <p>Account Number:<span style="margin-left:5px">{{$u->id}}</span></p>
		       <p>Password:<span style="margin-left:5px; margin-right:5px">**********</span>[<a href="/atm/changepass/{{ $u->id }}">Edit</a>]</p>
		       <p>Account Type:<span style="margin-left:5px; margin-right:5px">{{$u->type }}</p>
		       <p>Balance:<span style="margin-left:5px; margin-right:5px">{{$u->balance }}</p>
		        @endforeach

				
		    </div>

			</div>
		</div>

		
	
	</div>

@stop
