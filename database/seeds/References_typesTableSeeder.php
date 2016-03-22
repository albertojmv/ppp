<?php

use Illuminate\Database\Seeder;
use App\References_type;

class References_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('references_types')->delete();
        
        References_type::create(array('name'=>'Personal'));
        References_type::create(array('name'=>'Comercial'));
        References_type::create(array('name'=>'Familiar'));
        References_type::create(array('name'=>'Laboral'));
    }
}
