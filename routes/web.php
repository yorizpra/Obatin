<?php

use App\Http\Controllers\DKonsumenController;
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

Route::get('/', 'WellcomeController@tampilobat');
Route::get('/profil', 'WellcomeController@profil');
Route::get('/get_obat','ObatController@getObat');




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/Admin', function () {
//     return view('admin');
// });
// Route::get('/Mitra', function () {
//     return view('mitra');
// });
// Route::get('/Konsumen', function () {
//     return view('konsumen');
// });
Route::group(['middleware'=>'auth:admin'],function(){

    //Menghitung Data di Dashboard
    Route::get('/admin/index', 'DAdminController@tampil');

    Route::get('/admin/konsumen','DKonsumenController@index');
    Route::get('/konsumen/add','DkonsumenController@create');
    Route::post('/konsumen/store','DkonsumenController@store');
    Route::get('/konsumen/edit/{id}','DkonsumenController@edit');
    Route::put('/konsumen/update/{id}', 'DKonsumenController@update');
    Route::get('/konsumen/delete/{id}', 'DKonsumenController@destroy');

    //mitra
    Route::get('/admin/mitra','DMitraController@index');
    // Route::get('/mitra/add','DMitraController@create');
    Route::post('/mitra/store','DMitraController@store');
    Route::get('/mitra/edit/{id}','DMitraController@edit');
    Route::put('/mitra/update/{id}', 'DMitraController@update');
    Route::get('/mitra/delete/{id}', 'DMitraController@destroy');


    // Route::get('/pemesanan','DAdminController@index');
    // Route::get('/admin/history/{id}','DetailPesananController@detailpesanan');
    // Route::get('transaksi/pesanan/{id}','DAdminController@edit');
    // Route::put('pesanan/update/{id}','DAdminController@update');
    // Route::get('transaksi-pesanan/hapus/{id}','DAdminController@destroy');








});

Route::group(['middleware'=>'auth:mitra'],function(){

    //Menghitung Data di Dashboard
    Route::get('/mitra/index', 'DMitraController@tampil');

    Route::get('mitra/obat', 'ObatController@index')->name('mitra.obat');
    Route::get('/mitra/tambah_obat', 'ObatController@create');
    Route::post('/mitra/store_obat', 'ObatController@store');
    Route::get('/mitra/obat/edit/{id}', 'ObatController@edit');
    Route::put('/Mitra/update_obat/{id}', 'ObatController@update')->name('mitra.obat.update');
    Route::get('/mitra/obat/hapus/{id}', 'ObatController@delete');
    // Kategori
    Route::get('/kategori/tampil','KategoriController@index')->name('kategori.tampil');
    Route::get('/kategori/add','KategoriController@create');
    Route::post('/kategori/store','KategoriController@store');
    Route::get('/kategori/edit/{id}', 'KategoriController@edit');
    Route::put('/kategori/update{id}', 'KategoriController@update');
    Route::get('/kategori/delete/{id}', 'KategoriController@destroy');
    //transaksi

    Route::get('transaksi-pesanan','PesananController@index');
    Route::get('transaksi-pesanan/add','PesananController@create');
    Route::post('Transaksi-pesanan/store','PesananController@store');
    Route::get('transaksi-pesanan/edit/{id}','PesananController@edit');
    Route::put('transaksi-pesanan/update/{id}','PesananController@update');
    Route::get('transaksi-pesanan/hapus/{id}','PesananController@destroy');
    Route::get('/bukti-pembayaran','DAdminController@buktiTF');


    //detail pesanan
    Route::get('mitra/detail_pesanan','DetailPesananController@index');
    Route::get('/mitra/history/{id}','DetailPesananController@detail');

    //Resep
    Route::get('upload','ResepController@index');
    Route::get('resep/edit/{id}','ResepController@edit');
    Route::put('resep/update/{id}','ResepController@update');
    Route::get('resep/hapus/{id}','ResepController@destroy');





});

Route::group(['middleware'=>'auth:konsumen'],function(){

    //Menghitung Data di Dashboard
   Route::get('/konsumen/index', 'DKonsumenController@tampil');
    route::get('/pesan/{id}','DKonsumenController@pesan');
    route::post('/pesan-checkout/{id}','DKonsumenController@pesancheckout');
    route::get('check-out', 'DkonsumenController@check_out');
    Route::delete('/check-out/{id}', 'DKonsumenController@delete');
    route::post('/konfirmasi-check-out/{id}', 'DKonsumenController@konfirmasi');
    route::get('history', 'HistoryController@index');
    route::get('history/{id}', 'HistoryController@detail');
    route::post('/upload-buktiTF/{id}', 'KonfirmasiPembayaranController@bukti_tf');
    route::get('upload_bukti/{id}', 'KonfirmasiPembayaranController@upload');
    Route::get('cetak-struk/{id}','HistoryController@cetakPDF');
    Route::post('Unggah-resep/store','ResepController@store');
    Route::get('resep/','ResepController@resep');






});

Route::group(['middleware'=>'guest'],function(){

    Route::get('/masuk','login@index');
    Route::get('/register','login@register');
    Route::post('/kirim', 'login@masuk');
    Route::post('/konsumen/register','login@store');
    Route::get('/mitra/register','login@registerm');
    Route::post('/mitra/add','login@storemitra');





});

Route::get('/keluar', 'login@keluar');

// Route::get('/masuk1', function () {
//      return view('masuk1');
// });


