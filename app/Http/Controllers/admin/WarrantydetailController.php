<?php

namespace App\Http\Controllers\Admin;

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
        
        return view("admin.warranty.index")->with("warranty_detail", $warranty_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $warranty_list = Warranty::lists("name", "id");
       return view('admin.warranty.createdetail', compact('warranty_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warranty_detail = new Warranty_detail();
        $warranty_detail->name = $request['name'];
        $warranty_detail->warranty_id = $request['warranty_id'];
        $warranty_detail->loan_id = $request['loan_id'];
        $warranty_detail->price = $request['price'];
        $warranty_detail->notes = $request['notes'];
        $warranty_detail->save();
        
        return Redirect::to('/admin/warrantydetail?search='.$request['loan_id']);
       
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
