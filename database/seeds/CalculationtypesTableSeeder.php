<?php

use Illuminate\Database\Seeder;
use App\Calculationtype;
class CalculationtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('calculationtypes')->delete();
        
        Calculationtype::create(array('name'=>'Interés Fijo'));
        Calculationtype::create(array('name'=>'Saldos solutos'));
        Calculationtype::create(array('name'=>'Saldo Insolutos'));
        
    }
}
