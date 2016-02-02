<?php

use Illuminate\Database\Seeder;

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
            'password' => bcrypt('secret')
            
        ));
    }
}
