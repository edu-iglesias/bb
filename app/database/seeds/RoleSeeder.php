<?php
class RoleSeeder extends Seeder 
{
    public function run()
    {

        DB::delete('delete from roles');
        
        DB::insert('insert into roles (name) values (?)', array('Admin'));
        DB::insert('insert into roles (name) values (?)', array('Bank Manager'));
        DB::insert('insert into roles (name) values (?)', array('Bank Assistant'));
        DB::insert('insert into roles (name) values (?)', array('Teller'));

    }
}