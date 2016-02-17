<?php

use Illuminate\Database\Seeder;
use App\Warranty;

class WarrantiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warranties')->delete();
        
        Warranty::create(array('name'=>'Sin Garantía'));
        Warranty::create(array('name'=>'Vehículo'));
        Warranty::create(array('name'=>'Inmuebles'));
    }
}
