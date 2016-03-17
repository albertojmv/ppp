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

    public function index(Request $request) {
        $users = \App\User::search($request['search'])->orderBy('users.id', 'desc')->paginate(10);
        $users->appends(['search' => $request['search']]);
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
        $_token = $request['_token'];

        $user = new User();
        $user->name = $name;
        $user->lastname = $lastname;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->role_id = $role_id;
        $user->state_id = 1;
        $user->remember_token = $_token;
        $user->save();

        return \Redirect::route('admin.users.index')->with('message', 'Usuario Guardado Correctamente');
    }

    public function show() {
        //
    }

    public function edit($id) {
        $states_list = \App\State::lists("name", "id");
        $roles_list = Role::lists("name", "id");
        $user = User::find($id);
        return \View::make("admin.users.edit", ['user' => $user], ['roles_list' => $roles_list])
                        ->with("states_list", $states_list);
        //\view('admin.users.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, $id) {
        $name = $request['name'];
        $lastname = $request['lastname'];
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $role_id = $request['role_id'];
        $state_id = $request['state_id'];

        $user = User::find($id);
        $user->name = $name;
        $user->lastname = $lastname;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->role_id = $role_id;
        $user->state_id = $state_id;
        $user->save();
        Session::flash('message', 'Usuario Actualizado Correctamente');
        return Redirect::to('/admin/users');
    }

}
