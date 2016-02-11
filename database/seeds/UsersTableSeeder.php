<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               
        User::create(array(
            'email'     => 'admin@admin.com',
            'name'=> 'Administrator',
            'username'=> 'admin',
            'password' => 'admin', 
            'role_id'=> '1',
            'state_id' => '1'
            
        ));
    }
}
