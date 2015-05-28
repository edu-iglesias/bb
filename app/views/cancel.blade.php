@extends('layouts.default')

@section('headline')
    Busy Buddies Airlines
@stop

@section('form-header')
    Cancellation of Reservation
@stop

@section('form-size')
col-md-6
@stop

@section('content')


    {{ Form::open(array('class' => 'form-signin', 'role' => 'form')) }}

    	<div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><label class="control-label">Ticket No. </label> </div>
                {{ Form::text('firstname',Session::get('firstname'), ['class'=>'form-control','maxlength'=>'100']) }}
                @if ($errors->has('how')) <p class="help-block"></p> @endif
            </div>
        </div>

        {{ Form::submit('Cancel It', ['id'=>'submit','class' => 'btn btn-lg btn-danger btn-block sbmt']) }}

    {{ Form::close() }}
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
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
        if (ev.date.valueOf() < checkout.date.valueOf()) 
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
                if(date.valueOf() < checkin.date.valueOf() )
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
        if(dateInput < dateToday)
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