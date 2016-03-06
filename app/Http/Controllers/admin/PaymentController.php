<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Loan;
use App\Quota;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $payments = Payment::orderBy('id', 'desc')->paginate(5);
        return \view("admin.payments.index")->with("payments", $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.payments.create");
    }
    
    public function showLoan(Request $request){
        
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
    public function store(Request $request)
    {
        $id = $request['loan'];
        
        $prestamo = Loan::findOrFail($id);
        $cuota = Quota::where('loan_id', '=', $id)->where('quotastatu_id', '<>', 3)->where('quotastatu_id', '<>', 4)->first();
        
        return view('admin.payments.show', ['prestamo' => $prestamo], ['cuota' => $cuota]);
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
}
