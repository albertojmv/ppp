<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index() {
        $users = \App\User::orderBy('id','desc')->paginate(10);
        return \View::make("admin.users.index")
                        ->with("users", $users);
    }

    public function create() {
        $roles_list = Role::lists("name", "id");
        return \View::make("admin.users.create", compact('roles_list'));
        //->with("roles_list",$roles_list);
        //$states = State::lists('name','id');
        //return view('index',compact('states'));
    }

    public function store() {
        $c = new \App\User();
        $c->name = \Illuminate\Support\Facades\Input::get('name');
        $c->lastname = \Illuminate\Support\Facades\Input::get('lastname');
        $c->username = \Illuminate\Support\Facades\Input::get('username');
        $c->email = \Illuminate\Support\Facades\Input::get('email');
        $c->password = \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Facades\Input::get('password'));
        $c->role_id = \Illuminate\Support\Facades\Input::get('role_id');
        $c->save();

        return \Redirect::route('admin.users.index');
    }

    public function show() {
        //
    }

}
