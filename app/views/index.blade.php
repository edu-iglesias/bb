@extends('layouts.default')

@section('headline')
    Busy Buddies Airlines
@stop

@section('form-header')
    Search Flight
@stop

@section('form-size')
col-md-6
@stop

@section('content')


    {{ Form::open(array('class' => 'form-signin', 'role' => 'form')) }}

		<div class="form-group">
		    <div class="input-group">
		        <div class="input-group-addon"><label class="control-label">Destination: </label> </div>
		        {{ Form::select('destination', $locations,  Input::old('destination'), ['class'=>'input-group', 'required']) }}
                @if ($errors->has('destination')) <p class="help-block"></p> @endif
            </div>
		</div>

		<div class="form-group">
            <div class="input-daterange input-group" id="datepicker" data-date="{{ date('Y-m-d') }}T" data-date-format="yyyy-mm-dd">
                <input type="text" class="form-control" name="start" value="" id="dpd1" style="text-align: center" placeholder="Click to select date" onchange="checkInput(this.value,this.id)">
                <span class="input-group-addon" style="vertical-align: top;height:20px">to</span>
                <input type="text" class="form-control" name="end" value="" id="dpd2" style="text-align: center"  placeholder="Click to select date" onchange="checkInput(this.value,this.id)">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><label class="control-label">Adults: </label> </div>
                <select name="adults" id='adults' onchange="changeContentChildren()" class="input-group form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>

                </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><label class="control-label">Children: </label> </div>
                <select name="cars" id='children' class="input-group form-control">
                    <option value="0">--Select--</option>
                </select>
            </div>
        </div>

        {{ Form::submit('Find It!', ['id'=>'submit','class' => 'btn btn-lg btn-success btn-block sbmt']) }}

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

<script>

function createOption(value) {
    el = document.createElement('option');
    el.value = value;
    el.innerHTML = value;
    el.id = value;
    
    document.getElementById('children').appendChild(el);
}

function changeContentChildren()
{
    var value = document.getElementById('adults').value;
    
    var remaining = 20 - value;

    var i = 1;

    var objChildren = document.getElementById('children')
    removeOptions(objChildren);

    createOption(0);
    while(i<=remaining)
    {
        createOption(i);
        i++;
    }
}

function removeOptions(obj) {
    if (obj == null) return;
    if (obj.options == null) return;
    obj.options.length = 0;  // That's it!
}

</script>
@stop