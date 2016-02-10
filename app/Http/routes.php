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

Route::get('/', function () {
    dd('saury');
    return view('welcome');
});
Route::get('home', 'HomeController@index');

Route::get('master', function() {
    return View::make('master.layout');
});
Route::get('customers', 'Admin\\CustomerController@index');




Route::group(['middleware' => ['web'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::resource("users", "UserController");
    

});


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

Route::group(['middleware' => ['web']], function () {
   
});

 Route::controller('login', 'LoginController');
 
 Route::get('logout', function()
        {
               Auth::logout();
               return view('login.index');
         
                              
        });