<?php


//roles

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'roles'],function(){
    Route::get('/',[
        'as'=>'roles.index',
        'uses'=>'RoleController@index',
        'middleware' => 'can:roles-list'
    ]);
    Route::get('/create',[
        'as'=>'roles.create',
        'uses'=>'RoleController@create',
        'middleware' => 'can:roles-add'
    ]);
    Route::post('/store',[
        'as'=>'roles.store',
        'uses'=>'RoleController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'roles.edit',
        'uses'=>'RoleController@edit',
        'middleware' => 'can:roles-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'roles.update',
        'uses'=>'RoleController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'roles.delete',
        'uses'=>'RoleController@destroy',
        'middleware' => 'can:roles-delete'
    ]);
});