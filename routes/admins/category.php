<?php

 //category

use Illuminate\Support\Facades\Route;

 Route::group(['prefix'=>'category'],function(){
    Route::get('/',[
        'as'=>'category.index',
        'uses'=>'CategoryController@index',
        'middleware' => 'can:category-list'
    ]);
    Route::get('/create',[
        'as'=>'category.create',
        'uses'=>'CategoryController@create',
        'middleware' => 'can:category-add'
    ]);
    Route::post('/store',[
        'as'=>'category.store',
        'uses'=>'CategoryController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'category.edit',
        'uses'=>'CategoryController@edit',
        'middleware' => 'can:category-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'category.update',
        'uses'=>'CategoryController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'category.delete',
        'uses'=>'CategoryController@destroy',
        'middleware' => 'can:category-delete'
    ]);
});