<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Quota;
use Carbon\Carbon;
use Redirect;

class QuotespaidController extends Controller {

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $this->validate($request, [
            'from' => 'required|date_format:d-m-Y',
            'until' => 'required|date_format:d-m-Y',
                ], $messages = ['from.required' => 'Ingrese la fecha de inicio.',
            'until.required' => 'Ingrese la fecha final.',
            'from.date_format' => 'El formato de la fecha Desde debe ser (Día – Mes – Año).',
            'until.date_format' => 'El formato de la fecha Hasta debe ser (Día – Mes – Año).',
        ]);
        $from = Carbon::parse($request['from']);
        $until = Carbon::parse($request['until']);
        $cuotas = Quota::where('quotastatu_id', '=', 3)
                ->where('updated_at', '>=', $from)
                ->where('updated_at', '<=', $until)
                ->orderBy('id', 'desc')
                ->paginate(5);
        return view('admin.reports.reportquotespaid', ['cuotas' => $cuotas]);
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

}
