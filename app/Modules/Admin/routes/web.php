<?php

Route::group(['module' => 'Admin' , 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers'], function() {

    // Route::get('/', function(){

    // 	// return view('Admin::showUsers');
    // });

    Route::get('/','TestController@index');

    Route::post('show-data1','TestController@show_data');

    Route::get('register', 'LoginController@index');

    Route::post('Insert-data', 'LoginController@insert_data');

    Route::get('login', 'LoginController@login');

    Route::post('Login-data', 'LoginController@login_data');

    Route::group(['middleware' => 'Checklogin'],function(){

    Route::get('dashboard-page','LoginController@dashboard_page');

    Route::get('edit-user{id?}','LoginController@edit_user');

    Route::post('Update-data','LoginController@update_data');

    Route::get('ok1', function(){

        return view('Admin::showUsers');
    });

    Route::get('logout-user','LoginController@logout_user');
});

});
