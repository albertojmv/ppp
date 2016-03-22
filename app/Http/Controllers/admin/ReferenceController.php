<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reference;
use App\Province;
use App\References_type;
use Redirect;

class ReferenceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $references = Reference::search($request['search'])->orderBy('id', 'desc')->paginate(5);
        return view("admin.references.index")->with("references", $references);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $provinces_list = Province::lists("name", "id");
        $references_list = References_type::lists("name", "id");
        return view('admin.references.create', ['provinces_list' => $provinces_list], ['references_list' => $references_list]);
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
            'phone' => 'required'
                ], $messages = ['name.required' => 'Digite el nombre.',
            'phone.required' => 'Digite el teléfono.',
        ]);
        $reference = new Reference();
        $reference->references_types_id = $request['references_types_id'];
        $reference->name = $request['name'];
        $reference->address = $request['address'];
        $reference->province_id = $request['province_id'];
        $reference->phone = $request['phone'];
        $reference->work = $request['work'];
        $reference->workphone = $request['workphone'];
        $reference->customer_id = $request['customer_id'];
        $reference->save();
        return Redirect::to('/admin/references/?search=' . $request['customer_id'])
                        ->with('message', 'Referencia Guardada Correctamente.');
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
        $provinces_list = Province::lists("name", "id");
        $references_list = References_type::lists("name", "id");
        $reference = Reference::find($id);
        return view('admin.references.edit', ['provinces_list' => $provinces_list], ['references_list' => $references_list])
                        ->with("reference", $reference);
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
            'phone' => 'required'
                ], $messages = ['name.required' => 'Digite el nombre.',
            'phone.required' => 'Digite el teléfono.',
        ]);
        $reference = Reference::find($id);
        $reference->references_types_id = $request['references_types_id'];
        $reference->name = $request['name'];
        $reference->address = $request['address'];
        $reference->province_id = $request['province_id'];
        $reference->phone = $request['phone'];
        $reference->work = $request['work'];
        $reference->workphone = $request['workphone'];
        $reference->save();
        return Redirect::route('admin.references.index')
                        ->with('message', 'Referencia Editada Correctamente.');
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
