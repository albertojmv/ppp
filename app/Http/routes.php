<?php


Route::group(['middleware' => 'web', 'auth', 'role', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    
    Route::get('/', 'DashboardController@index');
    Route::resource("users", "UserController");
    Route::resource("customers", "CustomerController");
    Route::get('customer/{id}', 'CustomerController@showCustomer');
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
    
});

Route::group(['middleware' => 'web', 'auth', 'role', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::resource('contacts', 'ContactController');
    Route::get('contact/{id}', 'ContactController@showContact');
    Route::resource('references', 'ReferenceController');
    Route::resource('quotas', 'QuotaController');
    Route::resource('incomes', 'IncomeController');
    Route::get('corrermora', function () {
        Artisan::call('calc:mora');
        return Redirect::back()->with('message', 'Se corrió el proceso de generar moras.');
    });
    Route::resource('reports', 'ReportController');
    Route::get('quotesoverdue', 'ReportController@quotesoverdue');
    Route::resource('reportsquotespaid', 'QuotespaidController');
    Route::get('quotespaid', 'ReportController@quotespaid');
    Route::resource('reportsloanssold', 'LoanssoldController');
    Route::get('loanssold', 'ReportController@loanssold');
});


Route::group(['middleware' => 'web'], function () {
    //Route::get('/', 'Auth\AuthController@showLoginForm');
    Route::auth();
    
    Route::resource('/', 'WebController');
    Route::resource('applications', 'LoanapplicationController');
    Route::resource('contacts', 'ContactController');
    Route::get('messages', 'WebController@message');
});
