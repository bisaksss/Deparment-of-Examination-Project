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

Route::get('/set_place_to_marking', function () {
    return view('set_place_to_marking');
    
});

Route::get('/genarate_qr_code', function () {
    $data=App\ol_paper_details::all();
    return view('genarate_qr_code')->with('table_data',$data);
    
});

Route::post('/add_ol_paper_details', 'manage_paper_details_controller@store_ol_details');

Route::post('/add_al_paper_details', 'manage_paper_details_controller@store_al_details');

Route::post('/set_marking_place', 'manage_paper_details_controller@store_set_marking_place_details');

Route::get('/select_details', 'manage_paper_details_controller@select_details_from_table');

