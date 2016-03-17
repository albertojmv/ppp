<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Loan;
use App\Quota;
use Carbon\Carbon;

class CalcularMora extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calc:mora';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando es para calcular la mora de cada cuota.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        \Log::info('Se ejecutó el comando para calcular la mora.');
        $recorrido = Quota::where("dateexpiration", "<", Carbon::now())->where("quotastatu_id", "=", 1)->get();
        if (count($recorrido) == 0) {
            return \Log::info('No existen cuotas con atraso.');
        } else {
            foreach ($recorrido as $resultado) {

                $prestamo = Loan::where('id', '=', $resultado->loan_id)->first();
                $mora = $resultado->amount * ($prestamo->surcharge / 100);

                $resultado->surcharge = $mora;
                $resultado->quotastatu_id = 2;
                $resultado->update();
            }
        }
    }

}
