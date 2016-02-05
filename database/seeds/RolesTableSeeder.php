<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        
        Role::create(array('name'=>'Administrador'));
        Role::create(array('name'=>'Gestor'));
        Role::create(array('name'=>'Cobrador'));
    }
}
