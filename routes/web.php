<?php

Route::get('/', 'HomeController@index')->name('Home');
Route::get('/{url}', 'HomeController@index')->name("page_init");


Route::group([
    'prefix' => 'admin',
    'namespace'=> 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});



Route::group([
    'prefix' => 'news'
], function () {
Route::get('/', 'NewsController@index')->name('News');
Route::get('/{id}', 'NewsController@show')->name('NewsOne');
});


