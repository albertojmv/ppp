<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use App\Civilstatu;
use App\Gender;
use App\Customer;
use App\Http\Requests;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
  public function index(){
        $customers = Customer::orderBy('id', 'desc')->paginate(5);
        return \View::make("admin.customers.index")->with("customers", $customers); 
        
    }
    public function create() {
        $countries_list = Country::lists("name_es", "id");
        $provinces_list = Province::lists("name", "id");
        $civilstatus_list = Civilstatu::lists("name", "id");
        $genders_list = Gender::lists("name", "id");
        return \view('admin.customers.create', compact('countries_list','provinces_list','civilstatus_list','genders_list'));
    }
    
    public function store(CustomerCreateRequest $request) {

        $name = $request['name'];
        $lastname = $request['lastname'];
        $phone = $request['phone'];
        $cellphone = $request['cellphone'];
        $cedula = $request['cedula'];
        $passport = $request['passport'];
        $country_id = $request['country_id'];
        $address = $request['address'];
        $province_id = $request['province_id'];
        $email = $request['email'];
        $civilstatu_id = $request['civilstatu_id'];
        $profession = $request['profession'];
        $gender_id = $request['gender_id'];
        $notes = $request['notes'];
        $birthdate = $request['birthdate'];
        $date = new \DateTime($birthdate);

        $customer = new Customer();
        $customer->name = $name;
        $customer->lastname = $lastname;
        $customer->phone = $phone;
        $customer->cellphone = $cellphone;
        $customer->cedula = $cedula;
        $customer->passport = $passport;
        $customer->country_id = $country_id;
        $customer->address = $address;
        $customer->province_id = $province_id;
        $customer->email = $email;
        $customer->civilstatu_id = $civilstatu_id;
        $customer->profession = $profession;
        $customer->gender_id = $gender_id;
        $customer->notes = $notes;
        $customer->birthdate = $date;
        $customer->save();

        return \Redirect::route('admin.customers.index')->with('message', 'Cliente Guardado Correctamente');
    }

    public function show() {
        //
    }
    
}
