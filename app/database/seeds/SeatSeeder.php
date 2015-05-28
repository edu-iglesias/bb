<?php
class SeatSeeder extends Seeder {
    public function run()
    {
        DB::table('seats')->delete();

        $total_flight = 30;

        $typesOfFlight = 2;

        $start = 1;
        $rows = 48;
        $cols = 9;

        $column = [
            'A', 'B', 'C',
            'D', 'E', 'F',
            'G', 'H', 'I',
        ];

        $firstLoop = 1;
        

        while($firstLoop <= $total_flight)
        {   
            $secondLoop = 1;
            while($secondLoop <= $typesOfFlight)
            {
                $thirdLoop = 1;
                while($thirdLoop <= 48)
                {
                    $fourthLoop = 0;
                    while($fourthLoop < 9)
                    {
                        if($secondLoop == 1)
                        {
                            $type = 'Depart';
                        }
                        else
                        {
                            $type = 'Return';
                        }

                        $seatNo = $thirdLoop . $column[$fourthLoop];
                        
                        $seat = new Seat;
                        $seat->flight_id = $firstLoop;
                        $seat->flight_type = $type;
                        $seat->seat_no = $seatNo;
                        $seat->ticket_no = "Available";
                        $seat->save();

                 


                        $fourthLoop++;
                    }

                    

                    $thirdLoop++;
                }
                
                $secondLoop++;
            }
            
            $firstLoop++;
        }
    }
}