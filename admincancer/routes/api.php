<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/prediksiurl','PrediksisController@datadisplayapi');
Route::get('/prediksiurl/{id}','PrediksisController@showdataapi');
Route::get('/pasienurl','PasiensController@dataapi');
Route::get('/getdata','PrediksisController@postGuzzleRequest');
Route::get('/category','CategoryController@listData');
Route::post('/login/pasien','PasiensController@loginPasien');
Route::post('/register','PasiensController@registerPasien');
Route::post('/login/dokter','DoktersController@loginDokter');
Route::get('/dokter','DoktersController@listData');
Route::get('/pemeriksaan/{role}/{id}','PemeriksaansController@getData');
Route::post('/appointment/make','PemeriksaansController@makeAppointment');
Route::post('/appointment/do','PemeriksaansController@doAppointment');


Route::group(['prefix' => 'states'], function()
{
    Route::get('/{countryId}', 'StateController@loadStates');
});


Route::group(['prefix' => 'cities'], function()
{
    Route::get('/{stateId}', 'CityController@loadCities');
});
Route::group(['prefix' => 'cities'], function()
{
    Route::get('/{stateId}', 'CityController@loadCities');
});
