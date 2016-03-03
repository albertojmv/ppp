<?php

use Illuminate\Database\Seeder;
use App\Loanstatu;

class LoanstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loanstatus')->delete();
        
        Loanstatu::create(array('name'=>'Activo'));
        Loanstatu::create(array('name'=>'Finalizado'));
        Loanstatu::create(array('name'=>'Cancelado'));
    }
}
