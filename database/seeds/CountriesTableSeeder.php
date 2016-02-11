<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

       
      
       
     
        Country::create(array('iso2' => 'DO', 'iso3' => 'DOM', 'name_es' => 'República Dominicana', 'name_en' => 'Dominican Republic'));
        Country::create(array('iso2' => 'EC', 'iso3' => 'ECU', 'name_es' => 'Ecuador', 'name_en' => 'Ecuador'));
        Country::create(array('iso2' => 'SV', 'iso3' => 'SLV', 'name_es' => 'El Salvador', 'name_en' => 'El Salvador'));
       
        Country::create(array('iso2' => 'FR', 'iso3' => 'FRA', 'name_es' => 'Francia', 'name_en' => 'France'));
        
        Country::create(array('iso2' => 'DE', 'iso3' => 'DEU', 'name_es' => 'Alemania', 'name_en' => 'Germany'));
       
   
    }
}
