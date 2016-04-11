<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Warranty;
use Redirect;

class TypeswarrantyController extends Controller {

    public function index(Request $request) {
        $warranties = Warranty::search($request['search'])->orderBy('warranties.id', 'desc')->paginate(5);
        $warranties->appends(['search' => $request['search']]);
        return view("manager.typeswarranties.index")
                        ->with("warranties", $warranties);
    }

    public function create() {
        return view('manager.typeswarranties.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre del tipo de garantía.',
        ]);
        $name = $request['name'];
        $warranty = new Warranty();
        $warranty->name = $name;
        $warranty->save();
        return Redirect::route('manager.typeswarranties.index')->with('message', 'Tipo de garantía creada correctamente.');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $warranty = Warranty::find($id);
        return view('manager.typeswarranties.edit', ['warranty' => $warranty]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required'
                ], $messages = [
            'name.required' => 'Debe digitar el nombre del tipo de garantía.',
        ]);
        $name = $request['name'];
        $warranty = Warranty::find($id);
        $warranty->name = $name;
        $warranty->save();
        return Redirect::route('manager.typeswarranties.index')->with('message', 'Tipo de garantía creada correctamente.');
    }

    public function destroy($id) {
        //
    }

}
