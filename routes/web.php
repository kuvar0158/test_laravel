<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
   
    return Redirect::to('admin');
});


// Route::get('/', function () {
//    // return Redirect::to('Admin::layout.login');
//    return Redirect::to('admin');
// });

// Route::get('show-data',function(){

//     	print_r('expression');die;
//     });

