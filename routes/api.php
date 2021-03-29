<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('konsumens', 'API\ApiKonsumenController@getkonsumenAll');
Route::get('createKonsumen/{id}', 'API\ApiKonsumenController@getKonsumen');
Route::post('konsumen', 'API\ApiKonsumenController@createKonsumen');
Route::put('konsumen-update/{id}', 'API\ApiKonsumenController@updateKonsumen');
Route::delete('konsumen-delete/{id}','API\ApiKonsumenController@deleteKonsumen');
Route::post('konsumen/register', 'API\ApiKonsumenController@store');

Route::get('get-obatAll', 'API\ApiObatController@getobatAll');
Route::get('get-obat/{id}', 'API\ApiObatController@getobat');
Route::post('obat-create', 'API\ApiObatController@createobat');
Route::put('obat-update/{id}', 'API\ApiObatController@updateobat');
Route::delete('obat-delete/{id}','API\ApiObatController@deleteobat');

// login
Route::post('login', 'API\ApiLoginController@login');

//Kategori
Route::get('get-kategoriAll', 'API\ApiKategoriController@getKategoriAll');
Route::get('get-kategori/{id}', 'API\ApiKategoriController@getKategori');
Route::post('create-Kategori', 'API\ApiKategoriController@createKategori');
Route::put('update-kategori/{id}', 'API\ApiKategoriController@updateKategori');
Route::delete('delete-kategori/{id}','API\ApiKategoriController@deleteKategori');

//pesanan
Route::get('get-pesanan','API\ApiPesananController@getPesanan');
Route::get('get-pesanan/{id}', 'API\ApiPesananController@getPesananId');
Route::put('update-pesanan/{id}', 'API\ApiPesananController@updatePesanan');
Route::post('create-pesanan', 'API\ApiPesananController@createPesanan');
Route::delete('delete-pesanan/{id}','API\ApiPesananController@deletePesanan');
//Detail Pesanan
Route::get('get-DetailPesanan','API\ApiDetailPesananController@getDetailPesanan');
Route::get('get-DetailPesanan/{id}', 'API\ApiDetailPesananController@getDetailPesananId');
Route::put('update-DetailPesanan/{id}', 'API\ApiDetailPesananController@updateDetailPesanan');
Route::post('create-DetailPesanan', 'API\ApiDetailPesananController@createDetailPesanan');
Route::delete('delete-DetailPesanan/{id}','API\ApiDetailPesananController@deleteDetailPesanan');
