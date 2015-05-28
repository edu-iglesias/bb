<?php
class FlightSeeder extends Seeder {
    public function run()
    {
        DB::table('locations')->delete();

        $a = [
            'Manila'


        ];

        $loop = 0;
        while($loop < 1)
        {

            $flight = new Flight;
            $flight->departure_flight_name = $a[$loop];
            $flight->departure_route = $b[$loop];
            $flight->departure_flight_frequency = $c[$loop];
            $flight->departure_time = $d[$loop];
            $flight->departure_arrival = $e[$loop];

            $flight->return_flight_name = $f[$loop];
            $flight->return_route = $g[$loop];
            $flight->return_flight_frequency = $h[$loop];
            $flight->return_time = $i[$loop];
            $flight->return_arrival= $j[$loop];
            
            $flight->save();

            $loop++;
        }
    }
}