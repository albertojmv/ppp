<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Paymentmethod;
use App\Calculationtype;
use Carbon\Carbon;

class CalcController extends Controller {

    public function index() {
        $paymentmethod_list = Paymentmethod::lists("name", "id");
        $calculationtype_list = Calculationtype::lists("name", "id");

        return view('admin.calc.create', compact('paymentmethod_list', 'calculationtype_list'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $delivery = Carbon::parse($request['delivery']);
        $array = $this->saveQuotas($request['calculationtype_id'], $request['amount'], $request['interest'], $request['quotas'], $request['paymentmethod_id'], $delivery);
        
        return view('admin.calc.show')
                        ->with('array', $array);
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

    protected function saveQuotas($calculationtype_id, $amount, $interest, $quotas, $paymentmethod_id, $delivery) {

        if ($calculationtype_id == 1) {
            $array = $this->interesSimple($amount, $interest, $quotas, $paymentmethod_id, $delivery);
        } elseif ($calculationtype_id == 2) {
            $array = $this->saldosInsolutos($amount, $interest, $quotas, $paymentmethod_id, $delivery);
        } elseif ($calculationtype_id == 3) {
            $array = $this->interesSobrec($amount, $interest, $quotas, $paymentmethod_id, $delivery);
        }
        return $array;
    }

    protected function interesSimple($amount, $interest, $quotas, $paymentmethod_id, $delivery) {
        $intereses = $amount * ($interest / 100) * $quotas;
        $balance = $amount + $intereses;
        for ($i = 1; $i <= $quotas; $i++) {
            //$balance = $saldomes - $this->calcquota($amount, $interest, $quotas);
            //$saldomes = $saldomes - $this->calcquota($amount, $interest, $quotas);
            $date = $this->calcfecha($paymentmethod_id, $delivery);
            $array[$i] = [
                'number' => $i,
                'datepayment' => $date->format('d-m-Y'),
                'amount' => $this->calcquota($amount, $interest, $quotas),
                'interest' => $intereses / $quotas,
                'capital' => $balance,
            ];
            $balance -= $this->calcquota($amount, $interest, $quotas);
        }
        return $array;
    }

    protected function saldosInsolutos($amount, $interest, $quotas, $paymentmethod_id, $delivery) {
        $cuota = $amount / $quotas;
        $saldo = $amount;
        for ($i = 1; $i <= $quotas; $i++) {
            $date = $this->calcfecha($paymentmethod_id, $delivery);

            $array[$i] = [
                'number' => $i,
                'datepayment' => $date->format('d-m-Y'),
                'amount' => $saldo * ($interest / 100) + $cuota,
                'interest' => $saldo * ($interest / 100),
                'capital' => $saldo,
            ];
            $saldo -= $cuota;
        }
        return $array;
    }

    protected function interesSobrec($amount, $interest, $quotas, $paymentmethod_id, $delivery) {
        $intereses = $amount * ($interest / 100);
        $balance = $amount + $intereses;
        for ($i = 1; $i <= $quotas; $i++) {
            $date = $this->calcfecha($paymentmethod_id, $delivery);
            $array[$i] = [
                'number' => $i,
                'datepayment' => $date->format('d-m-Y'),
                'amount' => $this->calcquota2($amount, $interest, $quotas),
                'interest' => $this->calcinte($amount, $interest, $quotas) / $quotas,
                'capital' => $balance,
            ];
            $balance -= $this->calcquota2($amount, $interest, $quotas);
        }
        return $array;
    }

    public function calcquota($amount, $interest, $quotas) {
        $total = $amount * ($interest / 100) * $quotas;
        $interes = $total / $quotas;
        $abono = $amount / $quotas;
        $payments = $interes + $abono;
        return $payments;
    }

    public function calcquota2($amount, $interest, $quotas) {
        $total = $amount + ($amount * $interest / 100);
        $payments = $total / $quotas;
        return $payments;
    }

    public function calcinte($amount, $interest, $quotas) {
        $total = $amount * ($interest / 100) * $quotas;
        $payments = $total / $quotas;

        return $payments;
    }

    protected function calcfecha($paymentmethod_id, $delivery) {
        if ($paymentmethod_id == 1) {
            return $delivery->addMonth();
        } elseif ($paymentmethod_id == 2) {
            return $delivery->addDays(15);
        } elseif ($paymentmethod_id == 3) {
            return $delivery->addDays(7);
        } elseif ($paymentmethod_id == 4) {
            return $delivery->addDay();
        }
    }

}
