<?php

use Illuminate\Database\Seeder;
use App\Formofpayment;

class FormofpaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formofpayments')->delete();
        
        Formofpayment::create(array('name'=>'Efectivo'));
        Formofpayment::create(array('name'=>'Cheque'));
        Formofpayment::create(array('name'=>'Depósito'));
        Formofpayment::create(array('name'=>'Otra'));
    }
}
