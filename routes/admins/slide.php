<?php




//slide

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'slide'],function(){
    Route::get('/',[
        'as'=>'slide.index',
        'uses'=>'SlideController@index',
        'middleware' => 'can:slide-list'
    ]);
    Route::get('/create',[
        'as'=>'slide.create',
        'uses'=>'SlideController@create',
        'middleware' => 'can:slide-add'
    ]);
    Route::post('/store',[
        'as'=>'slide.store',
        'uses'=>'SlideController@store'
      
    ]);
    Route::get('/edit/{id}', [
        'as'=>'slide.edit',
        'uses'=>'SlideController@edit',
        'middleware' => 'can:slide-edit'

    ]);
    Route::post('/update/{id}',[
        'as'=>'slide.update',
        'uses'=>'SlideController@update'
        
    ]);
    Route::get('/delete/{id}',[
        'as'=>'slide.delete',
        'uses'=>'SlideController@destroy',
        'middleware' => 'can:slide-delete'
    ]);
});