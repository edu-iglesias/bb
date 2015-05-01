<?php
class AdminSeeder extends Seeder {
    public function run()
    {

        DB::table('users')->delete();

        $admin = new User;
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('admin');
        $admin->first_name = 'Carmina';
        $admin->last_name = 'Iglesias';
        $admin->middle_name = 'Potot';
        $admin->user_type = '1';
        $admin->gender = 'Female';
        $admin->address = 'Bacoor Cavite';
        $admin->contact = '+639192845458';
        $admin->status = '1';
        $admin->save();

        $assign = new Assigned;
        $assign->user_id = $admin->id;
        $assign->role_id = 1;
        $assign->save();
    }
}