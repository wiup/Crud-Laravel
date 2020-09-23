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
Route::post('/company/s/','CompanyController@autoComplete')->name('company.autoComplete')->middleware('auth');
Route::post('company/search/', 'CompanyController@search')->name('company.search')->middleware('auth');
Route::get('/company/employees/{company}','CompanyController@companyEmployees')->name('company.employees')->middleware('auth');

//Employee routes

Route::prefix('company')->group(function(){

    Route::post('/employees/s/','EmployeeController@autoComplete')->name('employee.autoComplete')->middleware('auth');
    Route::post('employees/search/', 'EmployeeController@search')->name('employee.search')->middleware('auth');
    route::resource('employee', 'EmployeeController')->except(['create'])->middleware('auth');
    Route::get('employee/create/{id}', 'EmployeeController@create')->name('employee.create')->middleware('auth');

});


Auth::routes();

Route::get('/register',function(){
   return redirect()->route('home');
});

Route::get('/home', function(){
   return redirect()->route('home');
});
