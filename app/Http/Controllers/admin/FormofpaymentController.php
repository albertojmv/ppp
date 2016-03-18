<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Formofpayment;
use Redirect;

class FormofpaymentController extends Controller {

    public function index(Request $request) {
        $formofpayments = Formofpayment::search($request['search'])->orderBy('formofpayments.id', 'desc')->paginate(5);
        $formofpayments->appends(['search' => $request['search']]);
        return view("admin.formofpayments.index")
                        ->with("formofpayments", $formofpayments);
    }

    public function create() {
        return view('admin.formofpayments.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre de la forma de pago.',
        ]);
        $name = $request['name'];
        $formofpayment = new Formofpayment();
        $formofpayment->name = $name;
        $formofpayment->save();
        return Redirect::route('admin.formofpayments.index')->with('message', 'Forma de pago creada correctamente.');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $formofpayment = Formofpayment::find($id);
        return view('admin.formofpayments.edit', ['formofpayment' => $formofpayment]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre de la forma de pago.',
        ]);
        $name = $request['name'];
        $formofpayment = Formofpayment::find($id);
        $formofpayment->name = $name;
        $formofpayment->save();
        return Redirect::route('admin.formofpayments.index')->with('message', 'Forma de pago actualizada correctamente.');
    }

    public function destroy($id) {
        //
    }

}
