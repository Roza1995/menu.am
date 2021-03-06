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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/{lang?}', function ($lan = null) {
    if(!empty($lang)){
        App::setlocale($lang);
    }
    return view('welcome');
});*/

Route::get('event', function(){
    event(new \App\Events\OrderShipped('on way'));
});

Route::get('listen',function (){
    return view('listen');
});

Route::get('/', function ($lan = null) {
    $lang = request()->has('lang')? request()->lang : '';
    if(!empty($lang)){
        App::setlocale($lang);
    }
    return view('welcome');
});

Route::get('products/add_to_cart', 'UserController@addToCart')
    ->name('addToCart');

Route::get('products/show_cart', 'UserController@showCart');
Route::post('/charge', 'CheckoutController@charge');




//Auth::routes();
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')
    ->middleware('verified')
    ->name('home');

Route::get('/product/export', 'ProductController@exportProducts')
    ->name('product_export');

Route::post('/product/import', 'ProductController@importProducts')
    ->name('product_import');

Route::get('/product/pdf', 'ProductController@generate_pdf')
    ->name('pdf');

Route::resource('admin/product', 'ProductController')->middleware('product');
Route::resource('user/order', 'UserController')->middleware('user');
//Route::get('/login/github', 'Auth\LoginController@socialite');
//Route::get('/login/github/callback', 'Auth\LoginController@socialiteCallback');

Route::get('/login/{website}', 'Auth\LoginController@socialite');
Route::get('/login/{website}/callback', 'Auth\LoginController@socialiteCallback');
