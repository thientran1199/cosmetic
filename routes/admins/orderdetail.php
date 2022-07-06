<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'orderdetail'],function(){
    Route::get('/',[
        'as'=>'orderdetail.index',
        'uses'=>'OrderDetailController@index',
        // 'middleware' => 'can:order-list'
    ]);
    
    Route::get('/delete/{id}',[
        'as'=>'order.delete',
        'uses'=>'MenuController@destroy',
        'middleware' => 'can:order-delete'
    ]);
});