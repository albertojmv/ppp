<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Loan;
use App\Quota;
use App\Surcharge;
use App\Notification;
use Carbon\Carbon;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function login(Request $request) {
        $this->validateLogin($request);
        //$this->correrMora();
        if (Auth::attempt(array('username' => $request->input('username'), 'password' => $request->input('password'), 'role_id' => 1, 'state_id' => 1))) {
            return redirect('admin');
        } elseif (Auth::attempt(array('username' => $request->input('username'), 'password' => $request->input('password'), 'role_id' => 2, 'state_id' => 1))) {
            return redirect('manager');
        }elseif (Auth::attempt(array('username' => $request->input('username'), 'password' => $request->input('password'), 'role_id' => 3, 'state_id' => 1))) {
            return redirect('collector');
        }
        return redirect('login')->withErrors('Usuario y/o contraseña incorrectos.');
    }

    public function correrMora() {
        //\Log::info('Se ejecutó el comando para calcular la mora.');
        $this->notification("Se ejecutó el proceso para calcular cuotas con mora.");
        $recorrido = Quota::where("dateexpiration", "<", Carbon::now())->where("quotastatu_id", "<>", 3)->where('quotastatu_id', '<>', 4)->get();
        if (count($recorrido) == 0) {
            return $this->notification("No existen cuotas con atraso.");
        } else {
            foreach ($recorrido as $resultado) {

                $prestamo = Loan::where('id', '=', $resultado->loan_id)->first();
                $mora = $resultado->amount * ($prestamo->surcharge / 100);
                $resultado->surcharge = $resultado->surcharge + $mora;
                $resultado->quotastatu_id = 2;
                $resultado->dateexpiration = Carbon::parse($resultado->dateexpiration)->addDays($this->calcDias($prestamo->paymentmethod_id) + $prestamo->payday);
                $resultado->update();
                $surcharge = new Surcharge();
                $surcharge->quota_id = $resultado->id;
                $surcharge->amount = $mora;
                $surcharge->save();
            }
        }
    }

    public function calcDias($paymentmethod_id) {
        if ($paymentmethod_id == 1) {
            return 30;
        } elseif ($paymentmethod_id == 2) {
            return 15;
        } elseif ($paymentmethod_id == 3) {
            return 7;
        } elseif ($paymentmethod_id == 4) {
            return 1;
        }
    }
    public function notification($msg){
        $notification = new Notification();
        $notification->message = $msg;
        $notification->save();
    }

}
