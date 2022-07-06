<?php


//users

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'users'],function(){
    Route::get('/',[
        'as'=>'users.index',
        'uses'=>'UsersController@index',
        'middleware' => 'can:users-list'
    ]);
    Route::get('/create',[
        'as'=>'users.create',
        'uses'=>'UsersController@create',
        'middleware' => 'can:users-add'
    ]);
    Route::post('/store',[
        'as'=>'users.store',
        'uses'=>'UsersController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'users.edit',
        'uses'=>'UsersController@edit',
        'middleware' => 'can:users-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'users.update',
        'uses'=>'UsersController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'users.delete',
        'uses'=>'UsersController@destroy',
        'middleware' => 'can:users-delete'
    ]);
});