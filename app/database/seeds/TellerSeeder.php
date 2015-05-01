<?php
class TellerSeeder extends Seeder {
    public function run()
    {

        $user = new User;
        $user->email = 'teller1@gmail.com';
        $user->password = Hash::make('teller1');
        $user->first_name = 'Shalhanie';
        $user->last_name = 'Tago';
        $user->middle_name = 'Bha';
        $user->user_type = '4';
        $user->gender = 'Female';
        $user->address = 'Quezon City';
        $user->contact = '+639198654321';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 4;
        $assign->save();


    }
}