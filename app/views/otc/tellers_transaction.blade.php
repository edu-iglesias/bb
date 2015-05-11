@extends('layouts.default')

@section('content')


	<h2>Transactions</h2>
	<hr>


	<div class="form-create col-md-12">

		<table align="center">
			<tr>
				<td>
					<a href="/otc/transactions/withdraw">
						{{ HTML::image('images/withdraw.png', 'alt', array( 'width' => 150, 'height' => 150 )) }}
					</a>
				</td>
				<td width="50"></td>
				<td>
					<a href="/otc/transactions/deposit">
						{{ HTML::image('images/deposit.png', 'alt', array( 'width' => 150, 'height' => 150 )) }}
					</a>
				</td>
			</tr>

			<tr>
				<td align="center">
					<br/>
					<a href="/otc/transactions/withdraw">Withdraw</a>
				</td>
				<td width="50"></td>
				<td align="center">
					<br/>
					<a href="/otc/transactions/deposit">Deposit</a>
				</td>
			</tr>
		</table>

	</div>
	
@stop
