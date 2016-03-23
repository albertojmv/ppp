<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Warranty_image;
use Redirect;

class WarrantyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.warranty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'image' => 'required'
                ], $messages = ['image.required' => 'La imagen es requerida.',
            'image.image' => 'Archivo no admitido.',
        ]);

        $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move('warranties', $name);
        //    \Storage::disk('local')->put($name, $request->file('image'));
        //dd($name);
        $warranty_image = new Warranty_image();
        $warranty_image->warranty_detail_id = $request['warranty_detail_id'];
        $warranty_image->name = $name;
        $warranty_image->description = $request['description'];
        $warranty_image->save();
        return Redirect::to('/admin/warranty/'.$request['warranty_detail_id'])->with('message', 'La imagen fue guardada correctamente.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        Warranty_image::destroy($id);
       
        return Redirect::back()->with('message', 'La imagen fue borrada.');
    }
     public function warranty($id){
        
          $imagenes = Warranty_image::where('warranty_detail_id', '=', $id)->get();
        
          return view('admin.loans.warranty', ['id' => $id], ['imagenes' => $imagenes]);
    }

}
