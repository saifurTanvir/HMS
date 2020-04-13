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
//index
Route::get('/SuperAdmin','SuperAdminController@index')->name('SuperAdmin.index')->middleware('sessionCheck');
//reporting
Route::get('/SuperAdmin/reporting','SuperAdminController@reporting')->name('SuperAdmin.reporting');
//Doctor
Route::get('/SuperAdmin/doctors','SuperAdminController@doctors')->name('SuperAdmin.doctors');
//Doctor Department
Route::get('/SuperAdmin/doctors/Department/{dep}','SuperAdminController@DoctorDepartment')->name('SuperAdmin.DoctorDepartment');
//Doctor Profile
Route::get('/SuperAdmin/doctorProfile/{DoctorId}','SuperAdminController@doctorProfile')->name('SuperAdmin.doctorProfile');
//edit Doctor
Route::get('/SuperAdmin/editDoctor/{DoctorId}','SuperAdminController@editDoctor')->name('SuperAdmin.editDoctor');
Route::post('/SuperAdmin/editDoctor/{DoctorId}','SuperAdminController@updateDoctor')->name('SuperAdmin.editDoctor');


//logout
Route::get('/logout', 'LogoutController@index')->name('logout');