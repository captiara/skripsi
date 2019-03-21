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
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');

Route::get('/profile', 'ProfileController@index');

Route::get('/artikel', 'ArtikelController@index');
Route::resource('artikel', 'ArtikelController');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::post('pasiens/search', 'PasiensController@search')->name('pasiens.search');
Route::resource('pasiens', 'PasiensController');

Route::post('dokters/search', 'DoktersController@search')->name('dokters.search');
Route::resource('dokters', 'DoktersController');

Route::post('category/search', 'CategoryController@search')->name('category.search');
Route::resource('category', 'CategoryController');

Route::post('pemeriksaans/search', 'PemeriksaansController@search')->name('pemeriksaans.search');
Route::post('pemeriksaans/store', 'PemeriksaansController@store')->name('pemeriksaans.store');
Route::resource('pemeriksaans', 'PemeriksaansController');

Route::post('prediksis/search', 'PrediksisController@search')->name('prediksis.search');
Route::post('prediksis/store', 'PrediksisController@store')->name('prediksis.store');
Route::resource('prediksis', 'PrediksisController');
Route::get('prediksis/test', 'PrediksisController@test');
Route::post('prediksis/save/{id}','PrediksisController@save')->name('prediksis.save');

Route::resource('statistik', 'StatistikController');


Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');
