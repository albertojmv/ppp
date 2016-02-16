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
        
        Loanstatu::create(array('name'=>'No procesado'));
        Loanstatu::create(array('name'=>'Procesado'));
        Loanstatu::create(array('name'=>'Finalizado'));
    }
}
