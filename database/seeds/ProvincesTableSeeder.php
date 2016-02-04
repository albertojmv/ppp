<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        
        Province::create(array('name'=>'Distrito Nacional'));
        Province::create(array('name'=>'Altagracia'));
        Province::create(array('name'=>'Azua'));
        Province::create(array('name'=>'Bahoruco'));
        Province::create(array('name'=>'Barahona'));
        Province::create(array('name'=>'Dajabon'));
        Province::create(array('name'=>'Duarte'));
        Province::create(array('name'=>'El Seybo'));
        Province::create(array('name'=>'Elias Piña'));
        Province::create(array('name'=>'Espaillat'));
        Province::create(array('name'=>'Hato Mayor'));
        Province::create(array('name'=>'Independencia'));
        Province::create(array('name'=>'La Romana'));
        Province::create(array('name'=>'La Vega'));
        Province::create(array('name'=>'Maria Trinidad Sanchez'));
        Province::create(array('name'=>'Monseñor Nouel'));
        Province::create(array('name'=>'Montecristi'));
        Province::create(array('name'=>'Monte Plata'));
        Province::create(array('name'=>'Pedernales'));
        Province::create(array('name'=>'Peravia'));
        Province::create(array('name'=>'Puerto Plata'));
        Province::create(array('name'=>'Hermanas Mirabal'));
        Province::create(array('name'=>'Samana'));
        Province::create(array('name'=>'San Cristobal'));
        Province::create(array('name'=>'San juan'));
        Province::create(array('name'=>'San Pedro de Macoris'));
        Province::create(array('name'=>'Sanchez Ramirez'));
        Province::create(array('name'=>'Santiago de los Caballeros'));
        Province::create(array('name'=>'Santiago Rodriguez'));
        Province::create(array('name'=>'Valverde'));
        Province::create(array('name'=>'San Jose de Ocoa'));
        Province::create(array('name'=>'Santo Domingo'));        
        
        
    }
}
