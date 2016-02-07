<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
use Session;
use Redirect;

class UserController extends Controller {

    public function index() {
        $users = \App\User::orderBy('id', 'desc')->paginate(10);
        return \view('admin.users.index')
                        ->with("users", $users);
    }

    public function create() {
        $roles_list = Role::lists("name", "id");
        return \view('admin.users.create', compact('roles_list'));
        
    }

    public function store(UserCreateRequest $request) {
       
        //User::create($request->all());
        $name = $request['name'];
        $lastname = $request['lastname'];
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $role_id = $request['role_id'];
        
        $user = new User();
        $user->name = $name;
        $user->lastname = $lastname;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->role_id = $role_id;
        
        $user->save();
        
        return \Redirect::route('admin.users.index')->with('message','store');
    }

    public function show() {
        //
    }

    public function edit($id) {
        $user = User::find($id);
        return \View::make("admin.users.edit", ['user' => $user]); 
        //\view('admin.users.edit', ['user' => $user]);
    }
    
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usersc');
    }

}
