<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Loan;
use App\Quota;
use App\Customer;
use App\Http\Requests\PaymentRequest;
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
    public function index(Request $request) {
        
        $payments = Payment::search($request['search'])->orderBy('payments.id', 'desc')->paginate(5);
        $payments->appends(['search' => $request['search']]);
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

    public function printPay($id) {
        $pago = Payment::find($id);
        $cuota = Quota::find($pago->quota_id);
        $prestamo = Loan::find($cuota->loan_id);
        $cliente = Customer::find($prestamo->customer_id);
        //dd($cliente->name);

        return view('admin.payments.recibo', ['prestamo' => $prestamo], ['cuota' => $cuota])->with("pago", $pago)->with("cliente", $cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request) {
        $action = $request['action'];

        if ($action == 1) {

            $this->validate($request, [
                'loan' => 'required|exists:loans,id|numeric'
                    ], $messages = ['loan.required' => 'Digite el número de préstamo.',
                'loan.exists' => 'No existe este préstamo.',
                'loan.numeric' => 'El valor no es correcto.',
            ]);

            $formofpayment_list = Formofpayment::lists("name", "id");
            $id = $request['loan'];

            $prestamo = Loan::find($id);

            $cuota = Quota::where('loan_id', '=', $id)->where('quotastatu_id', '<>', 3)->where('quotastatu_id', '<>', 4)->first();
            if (count($cuota) == 0) {
                return Redirect::back()->with('message', 'Todas las cuotas de este préstamo están saldadas.');
            }

            $pagos = DB::table('payments')
                            ->select(DB::raw('SUM(amount) as total_amount'))
                            ->where('quota_id', '=', $cuota->id)->first();

            return view('admin.payments.show', ['prestamo' => $prestamo], ['cuota' => $cuota])->with("formofpayment_list", $formofpayment_list)->with("pagos", $pagos);
        } else {

            $this->validate($request, [
                'pay' => 'required|numeric'
                    ], $messages = [
                'pay.numeric' => 'No es un valor numérico.',
                'pay.required' => 'Debe digitar el monto a pagar para realizar el pago.',
            ]);

            $amount = $request['pay'];
            $notes = $request['notes'];
            $formofpayment_id = $request['formofpayment_id'];
            $quota_id = $request['quota_id'];
            $total = $request['total'];

            if ($amount > $total) {

                return Redirect::route('admin.payments.create')
                                ->with('message', 'El pago es mayor al monto pendiente de la cuota.');
            } 

            $payment = new Payment();
            $payment->amount = $amount;
            $payment->notes = $notes;
            $payment->formofpayment_id = $formofpayment_id;
            $payment->quota_id = $quota_id;
            $payment->save();

            $this->editStatus($amount, $total, $quota_id);
//            $quota = Quota::findOrFail($quota_id);
//
//            if ($amount < $total) {
//                $quota->quotastatu_id = 1;
//                $quota->update();
//            } else {
//                $quota->quotastatu_id = 3;
//                $quota->update();
//            }
            //Redirect::to('/admin/payment/'.$payment->id);
            return Redirect::route('admin.payments.index')->with('message', 'Pago Guardado Correctamente');
        
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
        $pago = Payment::find($id);
        $cuota = Quota::find($pago->quota_id);
        $prestamo = Loan::find($cuota->loan_id);
        $cliente = Customer::find($prestamo->customer_id);
        $formofpayment_list = Formofpayment::lists("name", "id");
        $pagos = DB::table('payments')
                        ->select(DB::raw('SUM(amount) as total_amount'))
                        ->where('quota_id', '=', $cuota->id)->first();

        return view('admin.payments.edit', ['prestamo' => $prestamo], ['cuota' => $cuota])
                        ->with("pago", $pago)
                        ->with("cliente", $cliente)
                        ->with("pagos", $pagos)
                        ->with("formofpayment_list", $formofpayment_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
                'amount' => 'required|numeric'
                    ], $messages = [
                'amount.numeric' => 'No es un valor numérico.',
                'amount.required' => 'Debe digitar el monto a pagar para editar el pago.',
            ]);
        
        $amount = $request['amount'];
        $notes = $request['notes'];
        $formofpayment_id = $request['formofpayment_id'];
        //$quota_id = $request['quota_id'];
        $total = $request['total'];

        if ($amount > $total) {

            return Redirect::back()
                            ->with('message', 'El pago es mayor al monto pendiente de la cuota.');
        } 
        $pago = Payment::find($id);
        $pago->amount = $amount;
        $pago->notes = $notes;
        $pago->formofpayment_id = $formofpayment_id;
        $pago->save();
        
       
       $this->editStatus($pago->amount, $total, $pago->quota_id);
        
//        $quota = Quota::findOrFail($pago->quota_id);
//
//            if ($pago->amount >= $total) {
//                $quota->quotastatu_id = 3;
//                $quota->update();
//            } elseif($pago->amount < $total) {
//                $quota->quotastatu_id = 1;
//                $quota->update();
//            }
        
        return Redirect::route('admin.payments.index')->with('message', ' El pago se editó correctamente.');
    
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
    
    public function editStatus($monto,$total,$cuota_id){
        
        $quota = Quota::findOrFail($cuota_id);

            if ($monto >= $total) {
                $quota->quotastatu_id = 3;
                $quota->update();
            } elseif($monto < $total) {
                $quota->quotastatu_id = 1;
                $quota->update();
            }
    }

}
