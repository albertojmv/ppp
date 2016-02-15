<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('genders')->delete();
        
        Gender::create(array('name'=>'M'));
        Gender::create(array('name'=>'F'));
        Gender::create(array('name'=>'O'));
    }
}
