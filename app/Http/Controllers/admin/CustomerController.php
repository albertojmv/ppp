<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
  public function index(){
        return \View::make("admin.customers.index");   
        
    }
    public function create() {
        $countries_list = Country::lists("name_es", "id");
        $provinces_list = Province::lists("name", "id");
        return \view('admin.customers.create', compact('countries_list'));
    }
    
}
