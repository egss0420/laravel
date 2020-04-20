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

Route::get('/', function () {
    return view('menu');
});

// XSS
Route::get('/xss/case1', 'xssController@case1');
Route::get('/xss/case2', 'xssController@case2');
Route::get('/xss/case3', 'xssController@case3');

// SQL
Route::get('/sql/case1', 'sqlDbClassController@case1');
Route::get('/sql/case2', 'sqlDbClassController@case2');


// CSRF
