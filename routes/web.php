<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

//Route::get('/{lang?}', function ($lang = null) {
//    if(!empty($lang)){
//        App::setLocale($lang);
//    }
//    return view('welcome');
//});
Route::get('/', function () {
    $lang = request()->has('lang') ? request()->lang : '';
    if(!empty($lang)){
        App::setLocale($lang);
    }
    return view('welcome');
});


//Auth::routes();
Auth::routes(['verify'=>true]);
Route::post('/products/import',
    'ProductController@importProducts')
    ->name('product_import');
Route::get('/products/export',
    'ProductController@exportProducts')
    ->name('product_export');


Route::get('/home', 'HomeController@index')
    ->middleware('verified')
    ->name('home');

Route::get('/product/export', 'ProductController@exportProducts')
    ->name('product_export');

Route::post('/product/import', 'ProductController@importProducts')
    ->name('product_import');
Route::get('/product/pdf', 'ProductController@productPdf')
    ->name('pdf');

Route::resource('admin/product', 'ProductController')->middleware('product');
Route::resource('user/order', 'UserController')->middleware('user');

Route::get('/login/{website}', 'Auth\LoginController@socialite');
Route::get('/login/{website}/callback', 'Auth\LoginController@socialiteCallback');
