<?php
class BankAssistantSeeder extends Seeder {
    public function run()
    {

        $user = new User;
        $user->email = 'bankassistant1@gmail.com';
        $user->password = Hash::make('bankassistant1');
        $user->first_name = 'Joyce Elaine';
        $user->last_name = 'Marticio';
        $user->middle_name = 'Ehra';
        $user->user_type = '3';
        $user->gender = 'Female';
        $user->address = 'Quezon City';
        $user->contact = '+639192845459';
        $user->status = '1';
        $user->save();

        $assign = new Assigned;
        $assign->user_id = $user->id;
        $assign->role_id = 3;
        $assign->save();

        
    }
}