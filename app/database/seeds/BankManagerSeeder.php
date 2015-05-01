<?php
class BankManagerSeeder extends Seeder {

    public function run()
    {

        $user = new User;
        $user->email = 'bankmanager1@gmail.com';
        $user->password = Hash::make('bankmanager1');
        $user->first_name = 'Edu';
        $user->last_name = 'Iglesias';
        $user->middle_name = 'Camara';
        $user->user_type = '2';
        $user->gender = 'Male';
        $user->address = 'Bacoor Cavite';
        $user->contact = '+63919654321';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 2;
        $assign->save();

        $user = new User;
        $user->email = 'bankmanager2@gmail.com';
        $user->password = Hash::make('bankmanager2');
        $user->first_name = 'Mark Rommel';
        $user->last_name = 'Pillo';
        $user->middle_name = 'Jean';
        $user->user_type = '2';
        $user->gender = 'Male';
        $user->address = 'Paco Manila';
        $user->contact = '+63919654322';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 2;
        $assign->save();

        $user = new User;
        $user->email = 'bankmanager3@gmail.com';
        $user->password = Hash::make('bankmanager3');
        $user->first_name = 'Mark Renan';
        $user->last_name = 'Placido';
        $user->middle_name = 'Angeles';
        $user->user_type = '2';
        $user->gender = 'Male';
        $user->address = 'Quezon City';
        $user->contact = '+63919654323';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 2;
        $assign->save();

        $user = new User;
        $user->email = 'bankmanager4@gmail.com';
        $user->password = Hash::make('bankmanager4');
        $user->first_name = 'Michael Joshua';
        $user->last_name = 'Pena';
        $user->middle_name = 'Adlus';
        $user->user_type = '2';
        $user->gender = 'Male';
        $user->address = 'Bacoor Cavite';
        $user->contact = '+63919654324';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 2;
        $assign->save();

        $user = new User;
        $user->email = 'bankmanager5@gmail.com';
        $user->password = Hash::make('bankmanager5');
        $user->first_name = 'Justine';
        $user->last_name = 'Ranches';
        $user->middle_name = 'Dela Cruz';
        $user->user_type = '2';
        $user->gender = 'Male';
        $user->address = "Quezon City";
        $user->contact = '+63919654325';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 2;
        $assign->save();
    }
}