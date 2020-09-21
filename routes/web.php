<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

//Company routes
route::resource('company','CompanyController')->middleware('auth');
Route::post('/company/s/','CompanyController@autoComplete')->name('autoComplete')->middleware('auth');
Route::post('company/search/', 'CompanyController@search')->name('search')->middleware('auth');
Route::get('/company/employees/{company}','CompanyController@companyEmployees')->name('company.employees')->middleware('auth');

//Employee routes
route::resource('employee', 'EmployeeController')->middleware('auth');

Auth::routes();

Route::get('/register',function(){
   return redirect()->route('home');
});

Route::get('/home', function(){
   return redirect()->route('home');
});
