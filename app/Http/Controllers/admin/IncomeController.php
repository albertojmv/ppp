<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Income;
use App\Typeofcompany;
use Redirect;

class IncomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $incomes = Income::search($request['search'])->orderBy('id', 'desc')->paginate(5);
        return view("admin.incomes.index")->with("incomes", $incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $typeofcompany_list = Typeofcompany::lists("name", "id");
        return view('admin.incomes.create', ['typeofcompany_list' => $typeofcompany_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return Redirect::to('/admin/incomes/?search=' . $request['customer_id'])
                ->with('message', 'Ingreso Guardado Correctamente');
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
        $income = Income::find($id);
        $typeofcompany_list = Typeofcompany::lists("name", "id");
        return view('admin.incomes.edit', ['income' => $income], ['typeofcompany_list' => $typeofcompany_list]);
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
        return Redirect::to('/admin/incomes/?search=' . $income->customer_id)
                ->with('message', 'Ingreso editado correctamente');
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
