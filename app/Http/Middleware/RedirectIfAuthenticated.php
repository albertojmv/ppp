<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            switch ($this->auth->user()->role_id)
            {
                case '1':
                    #Administrador
                    return redirect()->to('admin');
                    break;

                case '2':
                    #Gestor
                    return redirect()->to('manager');
                    break;

                case '3':
                    #Cobrador
                    return redirect()->to('collector');
                    break;

                default:
                    return redirect()->to('login');

            }
            return redirect('/admin');
        }

        return $next($request);
    }
}
