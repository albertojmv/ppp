<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Loan;
use App\Quota;
use App\Surcharge;
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
        
        $recorrido = Quota::where("dateexpiration", "<", Carbon::now())->where("quotastatu_id", "<>", 3)->where('quotastatu_id', '<>', 4)->get();
        if (count($recorrido) == 0) {
            return \Log::info('No existen cuotas con atraso.');
        } else {
            foreach ($recorrido as $resultado) {

                $prestamo = Loan::where('id', '=', $resultado->loan_id)->first();
                $mora = $resultado->amount * ($prestamo->surcharge / 100);
                $resultado->surcharge = $resultado->surcharge + $mora;
                $resultado->quotastatu_id = 2;
                $resultado->dateexpiration = Carbon::parse($resultado->dateexpiration)->addDays($this->calcDias($prestamo->paymentmethod_id)+$prestamo->payday);
                $resultado->update();
                $surcharge = new Surcharge();
                $surcharge->quota_id = $resultado->id;
                $surcharge->amount = $mora;
                $surcharge->save();
            }
        }
        
    }

    public function calcSurcharge() {
        $cuotas = Quota::where("quotastatu_id", "=", 2)->get();
        if (count($cuotas) == 0) {
            return \Log::info('No existen cuotas 2 con atraso.');
        }
        foreach ($cuotas as $cuota) {
            $prestamo = Loan::where('id', '=', $cuota->loan_id)->first();
            $ok = Surcharge::where("quota_id", "=", $cuota->id)->orderBy('id', 'desc')->first();
            $mora = Surcharge::where("quota_id", "=", $cuota->id)
                            ->where(Carbon::parse($ok->created_at)->addDays($this->calcDias($prestamo->paymentmethod_id)+$prestamo->payday), "<", Carbon::now())
                            ->orderBy('id', 'desc')->first();
        if (count($mora) == 0) {
            return \Log::info('No existen cuotas 3 con atraso.');
        }
            $cuotasm = Quota::where("id", "=", $mora->quota_id)->first();
            $calculo = $cuotasm->surcharge + ($cuotasm->amount * ($prestamo->surcharge / 100));
            $cuotasm->surcharge = $calculo;
            $cuotasm->update();
            $surcharge = new Surcharge();
            $surcharge->quota_id = $mora->quota_id;
            $surcharge->amount = $cuotasm->amount * ($prestamo->surcharge / 100);
            $surcharge->save();
            
        }
    }
    public function calcDias($paymentmethod_id){
        if ($paymentmethod_id == 1) {
            return 30;
        } elseif ($paymentmethod_id == 2) {
            return 15;
        } elseif ($paymentmethod_id == 3) {
            return 7;
        } elseif ($paymentmethod_id == 4) {
            return 1;
        }
    }

}
