<?php

 
//setting

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'setting'],function(){
    Route::get('/',[
        'as'=>'setting.index',
        'uses'=>'SettingController@index',
        'middleware' => 'can:setting-list'
    ]);
    Route::get('/create',[
        'as'=>'setting.create',
        'uses'=>'SettingController@create',
        'middleware' => 'can:setting-add'
    ]);
    Route::post('/store',[
        'as'=>'setting.store',
        'uses'=>'SettingController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'setting.edit',
        'uses'=>'SettingController@edit',
        'middleware' => 'can:setting-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'setting.update',
        'uses'=>'SettingController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'setting.delete',
        'uses'=>'SettingController@destroy',
        'middleware' => 'can:setting-delete'
    ]);
});