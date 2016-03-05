<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Paymentmethod;
use App\Warranty;
use App\Calculationtype;
use App\Loanstatu;
use App\Loan;
use App\Quota;

class LoanController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $loans = Loan::orderBy('id', 'desc')->paginate(5);
        return \view("admin.loans.index")->with("loans", $loans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $warranty_list = Warranty::lists("name", "id");
        $paymentmethod_list = Paymentmethod::lists("name", "id");
        $calculationtype_list = Calculationtype::lists("name", "id");
        $loanstatu_list = Loanstatu::lists("name", "id");

        return \view('admin.loans.create', compact('paymentmethod_list', 'warranty_list', 'calculationtype_list', 'loanstatu_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request) {
        $customer_id = $request['customer_id'];
        $warranty_id = $request['warranty_id'];
        $paymentmethod_id = $request['paymentmethod_id'];
        $payday = $request['payday'];
        $interest = $request['interest'];
        $surcharge = $request['surcharge'];
        $amount = $request['amount'];
        $quotas = $request['quotas'];
        $calculationtype_id = $request['calculationtype_id'];
        //$loanstatu_id = $request['loanstatu_id'];
        $delivery = Carbon::parse($request['delivery']);
        $notes = $request['notes'];
        $deliveryexp = Carbon::parse($request['delivery'])->addDays($payday);
        //$this->GenerateSurchatge();
        //exit();

        $loan = new Loan();
        $loan->customer_id = $customer_id;
        $loan->warranty_id = $warranty_id;
        $loan->paymentmethod_id = $paymentmethod_id;
        $loan->payday = $payday;
        $loan->interest = $interest;
        $loan->surcharge = $surcharge;
        $loan->amount = $amount;
        $loan->quotas = $quotas;
        $loan->calculationtype_id = $calculationtype_id;
        $loan->loanstatu_id = 1;
        $loan->delivery = $delivery;
        $loan->notes = $notes;
        $loan->save();

        $this->saveQuotas($calculationtype_id, $amount, $interest, $quotas, $paymentmethod_id, $delivery, $deliveryexp, $payday, $loan->id);

//        $intereses = $amount * ($interest / 100);
//        $saldomes = $amount + $intereses;
//
//
//        for ($i = 0; $i <= $quotas - 1; $i++) {
//            $balance = $saldomes - $this->calcquota($amount, $interest, $quotas);
//            $saldomes = $saldomes - $this->calcquota($amount, $interest, $quotas);
//
//            $quota = new Quota();
//            $date = $this->calcfecha($paymentmethod_id, $delivery);
//            $deliveryex = $this->calcfecha($paymentmethod_id, $deliveryexp);
//            $dateex = $this->calcfechaex($payday, $deliveryex);
//            $quota->datepayment = $date;
//
//            $quota->dateexpiration = $dateex;
//
//            $quota->amount = $this->calcquota($amount, $interest, $quotas);
//            $quota->surcharge = 0;
//            $quota->interest = $this->calcinte($amount, $interest, $quotas);
//            $quota->capital = $balance;
//            $quota->loan_id = $loan->id;
//            $quota->quotastatu_id = 1;
//            $quota->save();
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $prestamo = Loan::findOrFail($id);
        $cuotas = Quota::where('loan_id', '=', $id)->get();

        return view('admin.loans.show', ['prestamo' => $prestamo], ['cuotas' => $cuotas]);
    }

    public function showLoan($id) {
        $prestamo = Loan::findOrFail($id);
        $cuotas = Quota::where('loan_id', '=', $id)->get();

        return view('admin.loans.show', ['prestamo' => $prestamo], ['cuotas' => $cuotas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function calcquota($amount, $interest, $quotas) {
        $total = $amount + ($amount * $interest / 100);
        $payments = $total / $quotas;
        return $payments;
    }

    public function calcinte($amount, $interest, $quotas) {
        $total = $amount * ($interest / 100);
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

    protected function calcfechaex($payday, $delivery) {

        return $delivery->addDays($payday);
    }

    protected function saveQuotas($calculationtype_id, $amount, $interest, $quotas, $paymentmethod_id, $delivery, $deliveryexp, $payday, $loan) {

        if ($calculationtype_id == 1) {

            $intereses = $amount * ($interest / 100);
            $saldomes = $amount + $intereses;


            for ($i = 1; $i <= $quotas; $i++) {
                $balance = $saldomes - $this->calcquota($amount, $interest, $quotas);
                $saldomes = $saldomes - $this->calcquota($amount, $interest, $quotas);

                $quota = new Quota();
                
                $date = $this->calcfecha($paymentmethod_id, $delivery);
                $deliveryex = $this->calcfecha($paymentmethod_id, $deliveryexp);
                //$dateex = $this->calcfechaex($payday, $deliveryex);
                $quota->number = $i;
                $quota->datepayment = $date;

                $quota->dateexpiration = $deliveryex;

                $quota->amount = $this->calcquota($amount, $interest, $quotas);
                $quota->surcharge = 0;
                $quota->interest = $this->calcinte($amount, $interest, $quotas);
                $quota->capital = $balance;
                $quota->loan_id = $loan;
                $quota->quotastatu_id = 1;
                $quota->save();
            }


            return dd("Interes Simple");
        } elseif ($calculationtype_id == 2) {

            $intereses = $amount * ($interest / 100);
            $saldomes = $amount;
            $ac = $amount / $quotas;

            for ($i = 1; $i <= $quotas; $i++) {
                $balance = $saldomes - $ac;
                $saldomes = $saldomes - $ac;

                $quota = new Quota();
                $date = $this->calcfecha($paymentmethod_id, $delivery);
                $deliveryex = $this->calcfecha($paymentmethod_id, $deliveryexp);
                //$dateex = $this->calcfechaex($payday, $deliveryex);
                $quota->number = $i;
                $quota->datepayment = $date;

                $quota->dateexpiration = $deliveryex;


                $quota->surcharge = 0;
                $quota->interest = $balance * ($interest / 100);
                $quota->amount = $ac + $quota->interest;
                $quota->capital = $balance;
                $quota->loan_id = $loan;
                $quota->quotastatu_id = 1;
                $quota->save();
            }

            return dd("Saldo Insoluto");
        }
    }

    public function GenerateSurchatge() {


        $recorrido = Quota::where("dateexpiration", "<", Carbon::now())->where("quotastatu_id", "=", 1)->get();
        if (count($recorrido) == 0) {
            return dd("No existen cuotas con mora");
        } else {
            foreach ($recorrido as $resultado) {

                $prestamo = Loan::where('id', '=', $resultado->loan_id)->first();
                $mora = $resultado->amount * ($prestamo->surcharge / 100);


                $resultado->surcharge = $mora;
                $resultado->quotastatu_id = 2;
                $resultado->update();
                print($mora . '</br>');
            }
        }

        //return dd($mora);
    }

}
