<?php

use Illuminate\Database\Seeder;
use App\Warranty;

class WarrantiesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('warranties')->delete();

        Warranty::create(array('name' => 'Vehículo'));
        Warranty::create(array('name' => 'Inmuebles'));
        Warranty::create(array('name' => 'Electrodoméstico'));
        Warranty::create(array('name' => 'Equipos Oficina'));
        Warranty::create(array('name' => 'Muebles'));
        Warranty::create(array('name' => 'Maquinaria'));
        Warranty::create(array('name' => 'Prendas'));
    }

}
