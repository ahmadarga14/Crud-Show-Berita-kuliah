<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\beritaController;

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
Route::get('hi', function () {
    echo "hi,salam kenal";
});
Route::get('/hi/{nama}', function ($nama) {
    return "hi,nama saya " . $nama;
});
Route::get('hello', 'App\Http\Controllers\HelloController@index'); 
Route::get('hello', 'App\Http\Controllers\HelloController@biodata'); 

Route::group(['prefix'=>"admin"], function ()  {
    route::get("dashboard",function(){
        return"Ini halaman dashboard";
    });
    route::get("profil",function(){
        return"Ini halaman profil";
    });
    route::redirect("home","dashboard");  
});

Route::get('/register','App\Http\Controllers\Registercontroller@daftar')->name("daftar");
Route::post('/register','App\Http\Controllers\Registercontroller@simpan')->name('simpan');

Route::get('/homepage','App\Http\Controllers\HomeController@home')->name("homepage");
Route::get('/profil','App\Http\Controllers\HomeController@profil')->name("profil");
Route::get('/produk','App\Http\Controllers\ProdukController@produk')->name("produk");
Route::get('/produk/detail/{id}','App\Http\Controllers\ProdukController@detail')->name("detail");
Route::get('/kontak','App\Http\Controllers\HomeController@kontak')->name("kontak");

Route::resource('mahasiswa','App\Http\Controllers\MahasiswaController',['name'=>',mahasiswa']);

// Route::resource('berita','App\Http\Controllers\beritaController',['name'=>',berita']);

Route::resource('berita', beritaController::class);


