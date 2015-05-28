@extends('layouts.default')

@section('header')
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
        {{ HTML::style('colvix/css/jquery.dataTables.css')}}
        {{ HTML::style('colvix/css/dataTables.colVis.css')}}
        {{ HTML::style('colvix/css/shCore.css')}}
        
        {{ HTML::script('colvix/js/jquery.js')}}
        {{ HTML::script('colvix/js/jquery.dataTables.js')}}
        {{ HTML::script('colvix/js/dataTables.colVis.js')}}
        {{ HTML::script('colvix/js/shCore.js')}}
        {{ HTML::script('colvix/js/demo.js')}}


        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $('#colvixTable').DataTable( {
                    dom: 'C<"clear">lfrtip'
                } );
            } );
        </script>
@stop

@section('headline')
    Busy Buddies Airlines
@stop

@section('form-header')
    Search Result
@stop

@section('form-size')
col-md-12
@stop

@section('content')
    

        <table  id="colvixTable" border=0 class="table table-bordered">
                <thead>
                    <tr>
                        <th>Flight Info for Departure</th>
                        <th>Flight Info for Return</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if(count($flights) == 0)
                        <tr><td colspan="7" align="center">No User Found.</td></tr>
                    @endif

                    @foreach($flights as $flight)

                        <tr>
                            <td>
                                <b>Flight Name: </b> {{ $flight->departure_flight_name }} <br>
                                <b>Flight Route: </b> {{ $flight->departure_route}} <br>
                                <b>Flight Frequency: </b> {{ $flight->departure_flight_frequency}} <br>
                                <b>Departure Time: </b> {{ $flight->departure_time}} <br>
                                <b>Arrival Time: </b> {{ $flight->departure_arrival}} <br>
                            </td>

                            <td>
                                <b>Flight Name: </b> {{ $flight->return_flight_name }} <br>
                                <b>Flight Route: </b> {{ $flight->return_route}} <br>
                                <b>Flight Frequency: </b> {{ $flight->return_flight_frequency}} <br>
                                <b>Departure Time: </b> {{ $flight->return_time}} <br>
                                <b>Arrival Time: </b> {{ $flight->return_arrival}} <br>
                            </td>
                            <td>PHP {{ number_format ( 80000 , 2, "." , "," ) }}</td>
                            <td><input type="radio" name="choose"></td>
                          
                        </tr>

                    @endforeach
                </tbody>
        </table>

        <br><br>

        <div class="jumbotron">
            <h5>Add ons</h5>
            

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <div class="input-group ">
                        <div class="input-group-addon"><label class="control-label">Seat Type </label> </div>
                        {{ Form::select('how', ['1' => 'Economy (+ PHP 0)', '2' => 'Business (+ PHP 500.00)', '3' => 'First Class (+ PHP 1,000.00)'], Input::old('how'), ['class'=>'input-group'] ); }}
                        @if ($errors->has('how')) <p class="help-block"></p> @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <div class="input-group ">
                        <div class="input-group-addon"><label class="control-label">Baggage and Meal</label> </div>
                        {{ Form::select('how', ['0' => 'None', '1' => 'Baggage only (+ PHP 500.00)', '2' => 'Meal Only (+ PHP 300.00)','3'=>'Baggage and Meal (+ Php 800)'], Input::old('how'), ['class'=>'input-group'] ); }}
                        @if ($errors->has('how')) <p class="help-block"></p> @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <div class="input-group ">
                        <div class="input-group-addon"><label class="control-label">Number of Tickets</label> </div>
                        <input type="number" min=1 max=20 class="input-group">
                        @if ($errors->has('how')) <p class="help-block"></p> @endif
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <hr>
            </div>

            <h4 align="right" >Total: Php 10,499.60</h4>

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