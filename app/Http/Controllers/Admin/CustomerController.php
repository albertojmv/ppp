<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use App\Civilstatu;
use App\Gender;
use App\Customer;
use App\Income;
use App\Reference;
use App\Http\Requests;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Carbon\Carbon;

class CustomerController extends Controller {

    public function index(Request $request) {
        $customers = Customer::search($request['search'])->orderBy('id', 'desc')->paginate(5);
        return view("admin.customers.index")->with("customers", $customers);
    }

    public function create() {
        $countries_list = Country::lists("name_es", "id");
        $provinces_list = Province::lists("name", "id");
        $civilstatus_list = Civilstatu::lists("name", "id");
        $genders_list = Gender::lists("name", "id");
        return \view('admin.customers.create', compact('countries_list', 'provinces_list', 'civilstatus_list', 'genders_list'));
    }

    public function store(CustomerCreateRequest $request) {
        
        $birthdate = Carbon::parse($request->input('birthdate'))->format('Y-m-d 00:00:00');
        
        $customer = new Customer();
        $customer->name = $request['name'];
        $customer->lastname = $request['lastname'];
        $customer->phone = $request['phone'];
        $customer->cellphone = $request['cellphone'];
        $customer->cedula = $request['cedula'];
        $customer->passport = $request['passport'];
        $customer->country_id = $request['country_id'];
        $customer->address = $request['address'];
        $customer->province_id = $request['province_id'];
        $customer->email = $request['email'];
        $customer->civilstatu_id = $request['civilstatu_id'];
        $customer->profession = $request['profession'];
        $customer->gender_id = $request['gender_id'];
        $customer->notes = $request['notes'];
        $customer->birthdate = $birthdate;
        $customer->user_id = \Auth::user()->id;
        $customer->save();
        return \Redirect::route('admin.customers.index')->with('message', 'Cliente Guardado Correctamente');
    }

    public function show() {
        //
    }

    public function edit($id) {
        $countries_list = Country::lists("name_es", "id");
        $provinces_list = Province::lists("name", "id");
        $civilstatus_list = Civilstatu::lists("name", "id");
        $genders_list = Gender::lists("name", "id");
        $customer = Customer::find($id);
        return \view('admin.customers.edit', ['customer' => $customer], ['countries_list' => $countries_list])
                        ->with("genders_list", $genders_list)
                        ->with("civilstatus_list", $civilstatus_list)
                        ->with("provinces_list", $provinces_list);
    }

    public function update(CustomerUpdateRequest $request, $id) {
        $birthdate = Carbon::parse($request->input('birthdate'))->format('Y-m-d 00:00:00');
      
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->lastname = $request['lastname'];
        $customer->phone = $request['phone'];
        $customer->cellphone = $request['cellphone'];
        $customer->cedula = $request['cedula'];
        $customer->passport = $request['passport'];
        $customer->country_id = $request['country_id'];
        $customer->address = $request['address'];
        $customer->province_id = $request['province_id'];
        $customer->email = $request['email'];
        $customer->civilstatu_id = $request['civilstatu_id'];
        $customer->profession = $request['profession'];
        $customer->gender_id = $request['gender_id'];
        $customer->notes = $request['notes'];
        $customer->birthdate = $birthdate;
        $customer->user_id = \Auth::user()->id;
        $customer->save();
        //Session::flash('message', 'Usuario Actualizado Correctamente');
        return Redirect::to('/admin/customers')->with('message', 'Usuario Actualizado Correctamente');
    }

    public function showCustomer($id) {
        $customer = Customer::find($id);
        $references = Reference::where('customer_id','=',$id)->get();
        $incomes = Income::where('customer_id','=',$id)->get();
        return view('admin.customers.show', compact('references','customer','incomes'));
    }

}
