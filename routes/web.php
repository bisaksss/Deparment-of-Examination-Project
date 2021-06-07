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
Route::get('/admin', function () {
    $error='';
    return view('admin_login')->with('err',$error);
});

Route::get('/admin_reg', function () {
    return view('admin_register');
});

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

Route::get('/set_place_to_marking_ol', function () {
    return view('set_place_to_marking_ol');
    
});

Route::get('/set_place_to_marking_al', function () {
    return view('set_place_to_marking_al');
    
});







Route::get('/genarate_qr_code', function () {
    $data=App\ol_paper_details::all();
    return view('genarate_qr_code')->with('table_data',$data);
    
});

Route::post('/add_ol_paper_details', 'manage_paper_details_controller@store_ol_details');

Route::post('/add_al_paper_details', 'manage_paper_details_controller@store_al_details');

Route::post('/set_marking_place_ol', 'manage_paper_details_controller@store_set_marking_place_details_ol');

Route::post('/set_marking_place_al', 'manage_paper_details_controller@store_set_marking_place_details_al');

Route::get('/select_details', 'manage_paper_details_controller@select_details_from_table');

Route::get('/delete_data','manage_paper_details_controller@delete_data');

Route::get('/mark_as_complete/{id}/{exam_type}','manage_paper_details_controller@mark_as_complete');

Route::get('/mark_as_not_complete/{id}/{exam_type}','manage_paper_details_controller@mark_as_not_complete');

Route::get('/delete_paper_bundle_data/{id}/{exam_type}','manage_paper_details_controller@delete_paper_bundle_data');

//Route::get('/qr_code_page', function () {
   // $genarate_qr=App\ol_paper_details::find($id);
   // return view('qr_code_page')->with('qr_data',$genarate_qr);
//});

Route::get('/genarate_qr_code_page/{id}/{exam_type}','manage_paper_details_controller@genarate_qr_code_page');

//Route::get('/select_marking_place', function () {
    //return view('select_marking_place');
    
//});
Route::get('/show_marking_place_database_ol','manage_paper_details_controller@show_marking_place_database_ol');

Route::get('/show_marking_place_database_al','manage_paper_details_controller@show_marking_place_database_al');

Route::get('/delete_marking_place_ol/{id}','manage_paper_details_controller@delete_marking_place_ol');

Route::get('/delete_marking_place_al/{id}','manage_paper_details_controller@delete_marking_place_al');

Route::get('/select_marking_place/{year}/{paper_quntity}/{distric}/{medium}/{subject}/{exam_type}','manage_paper_details_controller@select_marking_place');


Route::get('/mark_as_select_ol/{id}','manage_paper_details_controller@mark_as_select_ol');

Route::get('/mark_as_not_select_ol/{id}','manage_paper_details_controller@mark_as_not_select_ol');

Route::get('/generate_qr_code_ol_marking_place/{id}','manage_paper_details_controller@generate_qr_code_ol_marking_place');

Route::get('/mark_as_select_al/{id}','manage_paper_details_controller@mark_as_select_al');

Route::get('/mark_as_not_select_al/{id}','manage_paper_details_controller@mark_as_not_select_al');

Route::get('/generate_qr_code_al_marking_place/{id}','manage_paper_details_controller@generate_qr_code_al_marking_place');

Route::post('/admin_login', 'manage_paper_details_controller@admin_login');

Route::post('/admin_register', 'manage_paper_details_controller@admin_register');

Route::get('/admin_logout','manage_paper_details_controller@admin_logout1');