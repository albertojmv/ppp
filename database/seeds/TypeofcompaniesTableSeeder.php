<?php

use Illuminate\Database\Seeder;
use App\Typeofcompany;

class TypeofcompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeofcompanies')->delete();
        
        Typeofcompany::create(array('name'=>'Negocio informal'));
        Typeofcompany::create(array('name'=>'Negocio establecido'));
        Typeofcompany::create(array('name'=>'Servicios profesionales'));
        Typeofcompany::create(array('name'=>'Empresa pequeña'));
        Typeofcompany::create(array('name'=>'Empresa mediana'));
        Typeofcompany::create(array('name'=>'Empresa privada'));
        Typeofcompany::create(array('name'=>'Servicios públicos'));
    }
}
