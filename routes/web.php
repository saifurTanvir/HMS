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

//Login Page Route
Route::get('/Login','LoginController@index')->name('Login.index');
Route::post('/Login','LoginController@verifyUser')->name('Login.verifyUser');

//Super Admin Page Route
Route::get('/SuperAdmin','SuperAdminController@index')->name('SuperAdmin.index');
Route::get('/SuperAdmin/report','SuperAdminController@report')->name('SuperAdmin.report');
Route::get('/SuperAdmin/Department/{dep}','SuperAdminController@department')->name('SuperAdmin.department');
Route::get('/SuperAdmin/DoctorProfile/{DoctorId}','SuperAdminController@doctorProfile')->name('SuperAdmin.doctorProfile');

Route::get('/SuperAdmin/editDoctor/{DoctorId}','SuperAdminController@editDoctor')->name('SuperAdmin.editDoctor');
Route::post('/SuperAdmin/editDoctor/{DoctorId}','SuperAdminController@updateDoctor')->name('SuperAdmin.editDoctor');
