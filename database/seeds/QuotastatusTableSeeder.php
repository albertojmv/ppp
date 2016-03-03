<?php

use Illuminate\Database\Seeder;
use App\Quotastatu;

class QuotastatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('quotastatus')->delete();
        
        Quotastatu::create(array('name'=>'Pendiente'));
        Quotastatu::create(array('name'=>'Con Mora'));
        Quotastatu::create(array('name'=>'Saldada'));
        Quotastatu::create(array('name'=>'Cancelada'));
    }
}
