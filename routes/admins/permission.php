<?php

//permission

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'permission'],function(){
    Route::get('/',[
        'as'=>'permission.index',
        'uses'=>'PermissionController@index',
        // 'middleware' => 'can:permission-list'
    ]);
    Route::get('/create',[
        'as'=>'permission.create',
        'uses'=>'PermissionController@create',
        // 'middleware' => 'can:permission-add'
    ]);
    Route::post('/store',[
        'as'=>'permission.store',
        'uses'=>'PermissionController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'permission.edit',
        'uses'=>'PermissionController@edit',
        // 'middleware' => 'can:permission-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'permission.update',
        'uses'=>'PermissionController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'permission.delete',
        'uses'=>'PermissionController@destroy',
        // 'middleware' => 'can:permission-delete' 
    ]);
});