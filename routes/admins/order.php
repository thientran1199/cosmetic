<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'orders'],function(){
    Route::get('/',[
        'as'=>'order.index',
        'uses'=>'OrderController@index',
        // 'middleware' => 'can:order-list'
    ]);
    
    Route::get('/delete/{id}',[
        'as'=>'order.delete',
        'uses'=>'MenuController@destroy',
        'middleware' => 'can:order-delete'
    ]);
});