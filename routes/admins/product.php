<?php



//product

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'product'],function(){
    Route::get('/',[
        'as'=>'product.index',
        'uses'=>'ProductController@index',
        'middleware' => 'can:product-list'
    ]);
    Route::get('/create',[
        'as'=>'product.create',
        'uses'=>'ProductController@create',
        'middleware' => 'can:product-add'
    ]);
    Route::post('/store',[
        'as'=>'product.store',
        'uses'=>'ProductController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'product.edit',
        'uses'=>'ProductController@edit',
        'middleware' => 'can:product-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'product.update',
        'uses'=>'ProductController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'product.delete',
        'uses'=>'ProductController@destroy',
        'middleware' => 'can:product-delete'
    ]);
});