<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Loan;
use App\Quota;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Formofpayment;
use Session;
use Redirect;
use DB;

class PaymentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $payments = Payment::orderBy('id', 'desc')->paginate(5);
        return \view("admin.payments.index")->with("payments", $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("admin.payments.create");
    }

    public function showLoan(Request $request) {

        $id = $request['loan'];

        $prestamo = Loan::findOrFail($id);
        $cuota = Quota::where('loan_id', '=', $id)->where('quotastatu_id', '<>', 3)->where('quotastatu_id', '<>', 4)->first();

        return view('admin.payments.show', ['prestamo' => $prestamo], ['cuota' => $cuota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $action = $request['action'];

        if ($action == 1) {

            $this->validate($request, [
                'loan' => 'required'
            ]);

            $formofpayment_list = Formofpayment::lists("name", "id");
            $id = $request['loan'];

            $prestamo = Loan::findOrFail($id);
            $cuota = Quota::where('loan_id', '=', $id)->where('quotastatu_id', '<>', 3)->where('quotastatu_id', '<>', 4)->first();
           
            
            $pagos = DB::table('payments')
                ->select(DB::raw('SUM(amount) as total_amount'))
                ->where('quota_id', '=', $cuota->id)->first();

            return view('admin.payments.show', ['prestamo' => $prestamo], ['cuota' => $cuota])->with("formofpayment_list", $formofpayment_list)->with("pagos", $pagos);
        } else {

            $this->validate($request, [
                'pay' => 'required'
            ]);

            $amount = $request['pay'];
            $notes = $request['notes'];
            $formofpayment_id = $request['formofpayment_id'];
            $quota_id = $request['quota_id'];
            $total = $request['total'];

            if ($amount > $total){
                Session::flash('message', 'El pago es mayor al monto pendiente de la cuota.');
                 
                return Redirect::back();
                
            }
            
            $payment = new Payment();
            $payment->amount = $amount;
            $payment->notes = $notes;
            $payment->formofpayment_id = $formofpayment_id;
            $payment->quota_id = $quota_id;
            $payment->save();
            
            $quota = Quota::findOrFail($quota_id);
            
            if($amount < $total){
                $quota->quotastatu_id = 1;
                $quota->update();
                return Redirect::route('admin.payments.index')->with('message', 'Pago Guardado Correctamente');
            }else{
            $quota->quotastatu_id = 3;
            $quota->update();
            return Redirect::route('admin.payments.index')->with('message', 'Pago Guardado Correctamente');
            }
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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

}
