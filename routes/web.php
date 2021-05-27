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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::get('/ol_paper_bundel', function () {
    return view('ol_paper_bundel');
    
});


Route::get('/al_paper_bundel', function () {
    return view('al_paper_bundel');
    
});

Route::get('/mannage_paper_bundle', function () {
    return view('mannage_paper_bundle');
    
});

Route::get('/genarate_qr_code', function () {
    return view('genarate_qr_code');
    
});

Route::post('/add_ol_paper_details', 'manage_paper_bundel_controller@store');

