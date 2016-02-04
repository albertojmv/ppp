<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    
    public function index(){
        return \View::make("admin.users.create"); 
        
    }

    public function create() {
        return \View::make("admin.users.create");
    }

    public function store() {
        $c=new \App\User();
        $c->name= \Illuminate\Support\Facades\Input::get('name');
        $c->lastname=\Illuminate\Support\Facades\Input::get('lastname');
        $c->username=\Illuminate\Support\Facades\Input::get('username');
        $c->email=\Illuminate\Support\Facades\Input::get('email');
        $c->password=\Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Facades\Input::get('password'));
        $c->role_id= 1;
        $c->save();
        
        return \Redirect::route('admin.users.create');
        
    }

}
