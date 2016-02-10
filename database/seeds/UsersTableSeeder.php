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
            'password' => Hash::make('admin'), // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
            'role_id'=> '1',
            'state_id' => '1'
        ));
    }
}
