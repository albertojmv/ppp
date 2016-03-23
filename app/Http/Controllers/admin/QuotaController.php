<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Quota;
use App\Payment;
use Redirect;

class QuotaController extends Controller {

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //$pagos = Payment::where('quota_id', '=', $id)->first();
        $quota = Quota::find($id);
        if ($quota->quotastatu_id == 3) {
                return Redirect::back()->with('message', 'No se puede editar esta cuota esta saldada.');
            }
        
        
        return view('admin.quotas.edit', ['quota' => $quota]);
    }

    public function update(Request $request, $id) {
        $quota = Quota::find($id);
        $quota->surcharge = $request['surcharge'];
        $quota->save();
        return Redirect::to('/admin/loan/'.$quota->loan_id)
                        ->with('message', 'Cuota actualizada correctamente.');
    }

    public function destroy($id) {
        //
    }

}
