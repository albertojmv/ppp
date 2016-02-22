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

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return \view("admin.loans.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warranty_list = Warranty::lists("name", "id");
        $paymentmethod_list = Paymentmethod::lists("name", "id");
        $calculationtype_list = Calculationtype::lists("name", "id");
        $loanstatu_list = Loanstatu::lists("name", "id");
        
        return \view('admin.loans.create', compact('paymentmethod_list','warranty_list','calculationtype_list','loanstatu_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
      $customer_id = $request['customer_id'];
      $warranty_id = $request['warranty_id'];
      $paymentmethod_id = $request['paymentmethod_id'];
      $payday = $request['payday'];
      $interest = $request['interest'];
      $surcharge = $request['surcharge'];
      $amount = $request['amount'];
      $quotas = $request['quotas'];
      $calculationtype_id = $request['calculationtype_id'];
      $loanstatu_id = $request['loanstatu_id'];
      $delivery = Carbon::parse($request->input('delivery'))->format('Y-m-d 00:00:00');
      $notes = $request['notes'];
      
      $total = $amount + ($amount * 0..$interest);
      $payments = $total / $quotas;
      
      
      
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
