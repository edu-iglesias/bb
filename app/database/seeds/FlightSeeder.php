<?php
class FlightSeeder extends Seeder {
    public function run()
    {
        DB::table('flights')->delete();

        $a = [
            '5J 473', '5J 483', '5J 483',
            '5J 891', '5J 907', '5J 893',
            '5J 561', '5J 561', '5J 561',
            '5J 529', '5J 527', '5J 529',
            '5J 961', '5J 959', '5J 963',

            '5J 991', '5J 993', '5J 995',
            '5J 333', '5J 339', '5J 339',
            '5J 404', '5J 404', '5J 404',
            '5J 637', '5J 635', '5J 635',
            '5J 849', '5J 849', '5J 849', 
        ];

        $b = [
            'Manila (MNL) To Bacolod (BCD)', 'Manila (MNL) To Bacolod (BCD)', 'Manila (MNL) To Bacolod (BCD)',
            'Manila (MNL) To Boracay (Caticlan) (MPH)', 'Manila (MNL) To Boracay (Caticlan) (MPH)', 'Manila (MNL) To Boracay (Caticlan) (MPH)',
            'Manila (MNL) To Cebu (CEB)', 'Manila (MNL) To Cebu (CEB)', 'Manila (MNL) To Cebu (CEB)',
            'Manila (MNL) To Coron (Busuanga) (USU)', 'Manila (MNL) To Coron (Busuanga) (USU)', 'Manila (MNL) To Coron (Busuanga) (USU)',
            'Manila (MNL) To Davao (DVO)', 'Manila (MNL) To Davao (DVO)', 'Manila (MNL) To Davao (DVO)',

            'Manila (MNL) To General Santos (GES)', 'Manila (MNL) To General Santos (GES)', 'Manila (MNL) To General Santos (GES)',
            'Manila (MNL) To Kalibo (KLO)', 'Manila (MNL) To Kalibo (KLO)', 'Manila (MNL) To Kalibo (KLO)',
            'Manila (MNL) To Laoag (LAO)', 'Manila (MNL) To Laoag (LAO)', 'Manila (MNL) To Laoag (LAO)',
            'Manila (MNL) To Puerto Princesa (PPS)', 'Manila (MNL) To Puerto Princesa (PPS)', 'Manila (MNL) To Puerto Princesa (PPS)',
            'Manila (MNL) To Zamboanga (ZAM)', 'Manila (MNL) To Zamboanga (ZAM)', 'Manila (MNL) To Zamboanga (ZAM)', 
        ];

        $c = [
            'Daily', 'Daily', 'Tu/We/Th/Sa',
            'Daily', 'Daily', 'Daily',
            'Tu/Th', 'Fr', 'Mo/Tu/We/Th/Su',
            'We', 'We', 'Mo/Tu/Fr/Sa',
            'Daily', 'Daily', 'Daily',

            'Daily', 'Tu/Th/Sa', 'Daily',
            'Su', 'Daily', 'Sa',
            'Th/Fr','Sa', 'Daily',
            'Daily', 'Daily', 'Daily', 
            'Mon/We/Th/Fr/Su', 'Mo/Th', 'Tu/Sa', 
        ];

        $d = [
            '04:20', '06:35', '06:35',
            '05:30', '06:00', '06:15',
            '01:25', '01:25', '01:25',
            '06:30', '09:30', '09:40',
            '03:45', '04:55', '07:00',

            '05:10', '06:35', '13:30',
            '09:00', '11:35', '11:25',
            '17:30', '17:40', '17:30',
            '08:05', '10:00', '10:20',
            '03:55', '03:55', '03:55', 
        ];

        $e = [
            '05:25', '07:45', '07:45',
            '06:30', '07:00', '07:15',
            '02:35', '02:35', '02:35',
            '07:30', '10:30', '10:40',
            '05:25', '06:45', '08:45', 

            '06:55', '08:25', '15:15',
            '10:00', '12:40', '12:30',
            '18:50', '19:00', '18:50',
            '09:25', '11:20', '11:35',
            '05:25', '05:25', '05:25',
        ];

        $f = [
            '5J 474', '5J 484', '5J 484',
            '5J 892', '5J 908', '5J 894',
            '5J 550', '5J 550', '5J 550',
            '5J 530', '5J 528', '5J 530',
            '5J 9728', '5J 9808', '5J 9808',

            '5J 992', '5J 994', '5J 994',
            '5J 334', '5J 340', '5J 340',
            '5J 405', '5J 405', '5J 405',
            '5J 638', '5J 636', '5J 636',
            '5J 850', '5J 850', '5J 850', 
        ];

        $g = [
            'Bacolod (BCD) To Manila (MNL)', 'Bacolod (BCD) To Manila (MNL)', 'Bacolod (BCD) To Manila (MNL)',
            'Boracay (Caticlan) (MPH) To Manila (MNL)', 'Boracay (Caticlan) (MPH) To Manila (MNL)', 'Boracay (Caticlan) (MPH) To Manila (MNL)',
            'Cebu (CEB) To Manila (MNL)', 'Cebu (CEB) To Manila (MNL)', 'Cebu (CEB) To Manila (MNL)',
            'Coron (Busuanga) (USU) To Manila (MNL)', 'Coron (Busuanga) (USU) To Manila (MNL)', 'Coron (Busuanga) (USU) To Manila (MNL)',
            'Davao (DVO) To Manila (MNL)', 'Davao (DVO) To Manila (MNL)', 'Davao (DVO) To Manila (MNL)',

            'General Santaos (GES) To Manila (MNL)', 'General Santaos (GES) To Manila (MNL)', 'General Santaos (GES) To Manila (MNL)',
            'Kalibo (KLO) To Manila (MNL)', 'Kalibo (KLO) To Manila (MNL)', 'Kalibo (KLO) To Manila (MNL)',
            'Laoag (LAO) To Manila (MNL)', 'Laoag (LAO) To Manila (MNL)', 'Laoag (LAO) To Manila (MNL)',
            'Puerto Princesa (PPS) To Manila (MNL)', 'Puerto Princesa (PPS) To Manila (MNL)', 'Puerto Princesa (PPS) To Manila (MNL)',
            'Zamboanga (ZAM) To Manila (MN)', 'Zamboanga (ZAM) To Manila (MN)', 'Zamboanga (ZAM) To Manila (MN)',
        ];


        

        $h = [
            'Daily', 'Daily', 'Tu/We/Th/Sa',
            'Daily', 'Tu/Th/Sa', 'Daily',
            'Su','Mo/We/Fr/Su', 'Mo/We/Fr/Su',
            'We', 'We', 'Mo/Tu/Fr/Sa', 
            'Tu/Th', 'Mo/We/Fr', 'Fr', 

            'Daily', 'Th', 'Sa',
            'Su', 'Daily', 'Sa',
            'Th/Fr', 'Sa', 'Daily',
            'Daily', 'Daily', 'Daily',
            'Mo/We/Th/Fr/Su', 'Mo/Th', 'Tu/Sa',
        ];

        $i = [
            '06:05', '08:45', '08:45',
            '06:50', '07:20', '07:35',
            '00:45', '00:45', '01:45',
            '07:50', '10:50', '11:00',
            '01:50', '01:50', '01:50', 

            '07:35', '09:05', '13:00',
            '10:40', '13:20', '13:10',
            '19:10', '19:20', '19:10',
            '10:05', '12:00', '12:05',
            '06:05', '06:05', '06:05',
        ];

        $j = [
            '07:10', '09:55', '09:55',
            '07:55', '08:25', '08:40',
            '02:00', '02:00', '03:00',
            '08:55', '11:55', '12:05',
            '03:30', '03:30', '03:30', 

            '09:25', '11:00', '14:55',
            '11:40', '14:30', '14:20',
            '20:30', '20:40', '20:30',
            '11:20', '13:20', '13:20',
            '07:35', '07:35', '07:35',
        ];

        $k = [
            '8000', '8000', '8000',
            '8000', '8000', '8000',
            '8000', '8000', '8000',
            '8000', '8000', '8000',
            '8000', '8000', '8000',

            '8000', '8000', '8000',
            '8000', '8000', '8000',
            '8000', '8000', '8000',
            '8000', '8000', '8000',
            '8000', '8000', '8000',
        ];

        $loop = 0;
        while($loop < 30)
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
            $flight->price = $k[$loop];
            
            $flight->save();

            $loop++;
        }
    }
}