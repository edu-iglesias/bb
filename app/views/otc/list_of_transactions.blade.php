@extends('layouts.default')

@section('header')

    {{ HTML::script('datepicker_range/foundation-datepicker.js')}}
    {{ HTML::style('datepicker_range/foundation-datepicker.css')}}

@stop


@section('content')
    <?php 
            $date_today = date('m/d/Y');
            echo "<input type='hidden' value='$date_today' id='date_today'>";
    ?>

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

    {{ Form::open() }}
        <div class="form-group col-md-9">
            <div class="input-daterange input-group" id="datepicker" data-date="{{ date('Y-m-d') }}T" data-date-format="yyyy-mm-dd">
                <input type="text" class="form-control" name="start" value="" id="dpd1" style="text-align: center" placeholder="Click to select date" onchange="checkInput(this.value,this.id)">
                <span class="input-group-addon" style="vertical-align: top;height:20px">to</span>
                <input type="text" class="form-control" name="end" value="" id="dpd2" style="text-align: center"  placeholder="Click to select date" onchange="checkInput(this.value,this.id)">
            </div>
        </div>
        {{ Form::submit('Apply', array('class' => 'btn btn-success col-md-3','onclick'=>'hideAlert()','id'=>'apply')) }}
    {{ Form::close(); }}

    <div class="form-create col-md-12" >
        <table  id="colvixTable" border=0 class="table table-bordered">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Account No.</th>
		                <th>Transaction</th>
		                <th>Amount</th>
		                <th>Total Balance</th>
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
		                    <td>{{ $trans->total_balance }}</td>
		                    <td>{{ $trans->created_at }}</td>

		                </tr>     

		            @endforeach
		        </tbody>
	    </table>
	</div>

@stop

@section('footer')



<script>
    $(function () 
    {
        // implementation of disabled form fields
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate() + 1, 0, 0, 0, 0);
                
        var checkin = $('#dpd1').fdatepicker(
        {
            onRender: function (date) 
            {
                return date.valueOf() > now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) 
        {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.update(newDate);
        }
            checkin.hide();
            $('#dpd2')[0].focus();
            }).data('datepicker');
                
        var checkout = $('#dpd2').fdatepicker({
            onRender: function (date) {
            // return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
                if(date.valueOf() < checkin.date.valueOf() || date.valueOf() > now.valueOf())
                {
                    return 'disabled';
                }

            }
        }).on('changeDate', function (ev) {
            checkout.hide();
        }).data('datepicker');
    });

    function checkInput(value,inputId)
    {
            //alert('test');

        var dateInput = new Date(value);
        var dateTodayTemp = document.getElementById('date_today').value;
        var dateToday = new Date(dateTodayTemp);
        if(dateInput > dateToday)
        {
            document.getElementById('invalidDate').style.display = 'block';
            document.getElementById("dpd1").value = dateTodayTemp;
            document.getElementById("dpd2").value = dateTodayTemp;

        }

        var start = document.getElementById('dpd1').value;
        var end = document.getElementById('dpd2').value;

        //alert(start);
        //alert(end);


        if(start != '' && end != '')
        {
            //alert('bukas na dapat');
            document.getElementById("apply").disabled = false;
        }
        else
        {
            //alert('sarado dapat');
            document.getElementById("apply").disabled = true;
        }
    }

    $( document ).ready(function() {

        document.getElementById("apply").disabled = true;
     
    });

</script>
@stop