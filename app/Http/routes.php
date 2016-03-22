<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//Route::get('/', function () {
//        return view('welcome');
//});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */


//Route::get('/', 'Auth\AuthController@showLoginForm');
Route::group(['middleware' => 'web', 'auth', 'role', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource("users", "UserController");
    Route::resource("customers", "CustomerController");
    Route::resource("loans", "LoanController");
    Route::get('loan/{id}', 'LoanController@showLoan');
    Route::resource("payments", "PaymentController");
    Route::get('payment/{id}', 'PaymentController@printPay');
    Route::resource("savepayment", "SavepaymentController");
    Route::get('warranty/{id}', 'WarrantyController@warranty');
    Route::resource("warranties", "WarrantyController");
    Route::resource("warrantydetail", "WarrantydetailController");
    Route::resource('settings', 'SettingsController');
    Route::resource('countries', 'CountryController');
    Route::resource('provinces', 'ProvinceController');
    Route::resource('formofpayments', 'FormofpaymentController');
    Route::resource('typeswarranties', 'TypeswarrantyController');
    Route::resource('applications', 'LoanapplicationController');
    Route::get('application/{id}', 'LoanapplicationController@viewapp');
    Route::resource('contacts', 'ContactController');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('corrermora', function () {
        Artisan::call('calc:mora');
        return Redirect::back()->with('message', 'Se corrió el proceso de generar moras.');
    });
    Route::resource('/', 'WebController');
    Route::resource('applications', 'LoanapplicationController');
    Route::resource('contacts', 'ContactController');
    Route::get('messages', 'WebController@message');
});
