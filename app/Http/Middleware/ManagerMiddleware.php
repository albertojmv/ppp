<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;

class ManagerMiddleware {

    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next) {
        switch ($this->auth->user()->role_id) {
            case 1:
                #Administrador
                return redirect()->to('admin');
                //break;

            case 2:
                #Gestor
                //return redirect()->to('manager');
                break;

            case 3:
                #Cobrador
                return redirect()->to('collector');
                //break;

            default:
                return redirect()->to('login');
        }
        return $next($request);
    }

}
