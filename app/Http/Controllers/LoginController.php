<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
class LoginController extends Controller {

    public function getIndex() {
        return \View::make('login.index');
    }

    public function postLogin(Request $request) {
        $username = $request['username'];
        $password = $request['password'];

        if (Auth::attempt(array('username' => $username, 'password' => $password, 'role_id' => 1, 'state_id' => 1))) {
            return \View::make('admin.dashboard');
        }


        return \View::make('login.index')
                        ->withErrors('error');
    }

}
