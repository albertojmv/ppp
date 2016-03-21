<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Loanapplication;

class LoanapplicationController extends Controller {

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $application = new Loanapplication();
        $application->name = $request['name'];
        $application->lastname = $request['lastname'];
        $application->cedula = $request['cedula'];
        $application->email = $request['email'];
        $application->phone = $request['phone'];
        $application->cellphone = $request['cellphone'];
        $application->amount = $request['amount'];
        $application->quotas = $request['quotas'];
        $application->workplace = $request['workplace'];
        $application->timeworked = $request['timeworked'];
        $application->salary = $request['salary'];
        $application->additional_income = $request['additional_income'];
        $application->concept_income = $request['concept_income'];
        $application->vehicle = $request['vehicle'];
        $application->brand = $request['brand'];
        $application->model = $request['model'];
        $application->year = $request['year'];
        $application->home = $request['home'];
        $application->time_living = $request['time_living'];
        $application->civilstatu_id = $request['civilstatu_id'];
        $application->save();
        return view('web.message')
                ->with('message', 'Se envió su solicitud de préstamo en menos de 24 horas te estará contactando uno de nuestros agentes.');
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
