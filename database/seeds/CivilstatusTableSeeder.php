<?php

use Illuminate\Database\Seeder;
use App\Civilstatu;

class CivilstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('civilstatus')->delete();
        
        Civilstatu::create(array('name'=>'Soltero'));
        Civilstatu::create(array('name'=>'Casado'));
        Civilstatu::create(array('name'=>'Unión Libre'));
    }
}
