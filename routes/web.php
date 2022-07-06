<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Providers\AuthServiceProvider;

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


Route::get('/', 'IndexController@index')->name('trangchu');
Route::get('/list-category/{slug}/{id}',[
    'as'=>'category.allproduct',
    'uses'=>'IndexController@listProduct',
    // 'middleware' => 'can:category-list'
]);
Route::get('/list-product/{slug}/{id}',[
    'as'=>'category.product',
    'uses'=>'IndexController@listProductByCategory',
    // 'middleware' => 'can:category-list'
]);
Route::get('/product-detail/{id}',[
    'as'=>'product.detail',
    'uses'=>'IndexController@productDetail',
    // 'middleware' => 'can:category-list'
]);

// Route::get('/listProductID', 'HomeController@index');
// Route::get('/home', 'HomeController@index');


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
Route::get('/403', function () {
    return view('403');
})->name('403');
//login
Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Auth::routes();
//cart
Route::get('addcart/{id}','CartController@addCart')->name('cart.add');
Route::get('deletecart/{id}','CartController@deleteCart')->name('cart.delete');
Route::get('deleteitemcart/{id}','CartController@deleteItemCart')->name('cart.itemdelete');
Route::get('listcart','CartController@listCart')->name('cart.list');
// Route::get('listcart','CartController@listCart')->name('cart.list');
// Route::get('listcart','CartController@listCart')->name('cart.list');

//cheeckout
Route::get('/pay', 'CartController@pay')->name('cart.pay');
Route::post('/pay', 'CartController@postComplete')->name('cart.pay');
Route::get('/succes', 'CartController@success')->name('success');
Route::get('/update', 'CartController@updateCart')->name('cart.update');