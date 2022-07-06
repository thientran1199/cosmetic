<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'menu'],function(){
    Route::get('/',[
        'as'=>'menu.index',
        'uses'=>'MenuController@index',
        'middleware' => 'can:menu-list'
    ]);
    Route::get('/create',[
        'as'=>'menu.create',
        'uses'=>'MenuController@create',
        'middleware' => 'can:menu-add'
    ]);
    Route::post('/store',[
        'as'=>'menu.store',
        'uses'=>'MenuController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'menu.edit',
        'uses'=>'MenuController@edit',
        'middleware' => 'can:menu-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'menu.update',
        'uses'=>'MenuController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'menu.delete',
        'uses'=>'MenuController@destroy',
        'middleware' => 'can:menu-delete'
    ]);
});