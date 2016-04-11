<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Income;
use App\Typeofcompany;
use Redirect;

class IncomeController extends Controller {

    
    public function index(Request $request) {
        $incomes = Income::search($request['search'])->orderBy('id', 'desc')->paginate(5);
        return view("manager.incomes.index")->with("incomes", $incomes);
    }

    
    public function create() {
        $typeofcompany_list = Typeofcompany::lists("name", "id");
        return view('manager.incomes.create', ['typeofcompany_list' => $typeofcompany_list]);
    }

    
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric',
                ], $messages = ['name.required' => 'Digite el nombre de la empresa.',
            'amount.required' => 'Digite el ingreso.',
            'amount.numeric' => 'El ingreso no tiene un formato correcto.',
        ]);
        $income = new Income();
        $income->name = $request['name'];
        $income->position = $request['position'];
        $income->amount = $request['amount'];
        $income->customer_id = $request['customer_id'];
        $income->typeofcompany_id = $request['typeofcompany_id'];
        $income->save();
        return Redirect::to('/manager/incomes/?search=' . $request['customer_id'])
                ->with('message', 'Ingreso Guardado Correctamente');
    }

    
    public function show($id) {
        //
    }

    
    public function edit($id) {
        $income = Income::find($id);
        $typeofcompany_list = Typeofcompany::lists("name", "id");
        return view('manager.incomes.edit', ['income' => $income], ['typeofcompany_list' => $typeofcompany_list]);
    }

    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric',
                ], $messages = ['name.required' => 'Digite el nombre de la empresa.',
            'amount.required' => 'Digite el ingreso.',
            'amount.numeric' => 'El ingreso no tiene un formato correcto.',
        ]);
        $income = Income::find($id);
        $income->name = $request['name'];
        $income->position = $request['position'];
        $income->amount = $request['amount'];
        $income->typeofcompany_id = $request['typeofcompany_id'];
        $income->save();
        return Redirect::to('/manager/incomes/?search=' . $income->customer_id)
                ->with('message', 'Ingreso editado correctamente');
    }

    
    public function destroy($id) {
        Income::destroy($id);
        return Redirect::back()->with('message', 'El ingreso fue borrado.');
    }

}
