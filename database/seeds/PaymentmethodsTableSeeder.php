<?php

use Illuminate\Database\Seeder;
use App\Paymentmethod;

class PaymentmethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentmethods')->delete();
        
        Paymentmethod::create(array('name'=>'Mensual'));
        Paymentmethod::create(array('name'=>'Quincenal'));
        Paymentmethod::create(array('name'=>'Semanal'));
        Paymentmethod::create(array('name'=>'Diario'));
    }
}
