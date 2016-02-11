<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class RoleMiddleware {

    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($this->auth->user()->role_id != 1) {
            Session::flash('message-error', 'Sin privilegios');
            return redirect()->to('admin/users');
        }
        return $next($request);
    }

}
