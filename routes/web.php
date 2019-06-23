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
    return redirect('login');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create');
Route::resource('companies', 'HomeController');
Route::post('/home', 'HomeController@store');
Route::delete('/home/{company}', 'HomeController@destroy');
Route::patch('/home/{company}', 'HomeController@update');
Route::get('/home/{company}/edit','HomeController@edit');


Route::resource('employees', 'EmployeesController');

Route::get('/home/{company}/employees','HomeController@showemployees');
Route::get('/{company}/create','EmployeesController@create');
Route::post('/home/{company}/employees', 'EmployeesController@store');
Route::delete('/home/employees/{employee}/delete', 'EmployeesController@destroy');
Route::get('/home/employees/{employee}/edit','EmployeesController@edit');
Route::patch('/home/employees/{employee}/edit', 'EmployeesController@update');
