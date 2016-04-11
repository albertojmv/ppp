<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Warranty_detail;
use App\Warranty;
use Redirect;

class WarrantydetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $warranty_detail = Warranty_detail::search($request['search'])->orderBy('id', 'desc')->paginate(5);
        
        return view("manager.warranty.index")->with("warranty_detail", $warranty_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $warranty_list = Warranty::lists("name", "id");
       return view('manager.warranty.createdetail', compact('warranty_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'price' => 'required|numeric',
                    ], $messages = ['name.required' => 'Digite el nombre del artículo.',
                'price.required' => 'Digite el precio del artículo.',
                'price.numeric' => 'El precio no tiene un formato correcto.',
            ]);
        $warranty_detail = new Warranty_detail();
        $warranty_detail->name = $request['name'];
        $warranty_detail->warranty_id = $request['warranty_id'];
        $warranty_detail->loan_id = $request['loan_id'];
        $warranty_detail->price = $request['price'];
        $warranty_detail->notes = $request['notes'];
        $warranty_detail->save();
        
        return Redirect::to('/manager/warrantydetail?search='.$request['loan_id'])->with('message', 'Garantía creada correctamente.');
       
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
        $warranty_list = Warranty::lists("name", "id");
        $warranty_detail = Warranty_detail::find($id);
        return view('manager.warranty.edit', ['warranty_list' => $warranty_list], ['warranty_detail' => $warranty_detail]);
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
        $this->validate($request, [
                'name' => 'required',
                'price' => 'required|numeric',
                    ], $messages = ['name.required' => 'Digite el nombre del artículo.',
                'price.required' => 'Digite el precio del artículo.',
                'price.numeric' => 'El precio no tiene un formato correcto.',
            ]);
        $warranty_detail = Warranty_detail::find($id);
        $warranty_detail->name = $request['name'];
        $warranty_detail->warranty_id = $request['warranty_id'];
        
        $warranty_detail->price = $request['price'];
        $warranty_detail->notes = $request['notes'];
        $warranty_detail->save();
        return Redirect::to('/manager/warrantydetail?search='.$warranty_detail->loan_id)->with('message', 'Garantia Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Warranty_detail::destroy($id);
        
        return Redirect::back()->with('message', 'La garantía fue borrada.');
    }
}
