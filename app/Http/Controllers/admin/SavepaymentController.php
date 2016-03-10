<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quota;
use App\Payment;
use Redirect;


class SavepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view("admin.payments.show");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.payments.show");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

                return Redirect::back()//route('admin.payments.create')
                                ->with('message', 'El pago es mayor al monto pendiente de la cuota.');
            } 

            $payment = new Payment();
            $payment->amount = $amount;
            $payment->notes = $notes;
            $payment->formofpayment_id = $formofpayment_id;
            $payment->quota_id = $quota_id;
            $payment->save();

            $this->editStatus($amount, $total, $quota_id);

            //Redirect::to('/admin/payment/'.$payment->id);
            return Redirect::route('admin.payments.index')->with('message', 'Pago Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
