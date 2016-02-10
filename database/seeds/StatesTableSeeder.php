<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();
        
        State::create(array('name'=>'Activo'));
        State::create(array('name'=>'Inactivo'));
       
    }
}
