<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');

Route::group([
    'prefix' => 'admin',
    'namespace'=> 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/add', 'IndexController@add')->name('add');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});

Route::group([
    'prefix' => 'news',
    'namespace'=> 'News',
], function () {
Route::get('/', 'NewsController@index')->name('news.all');
Route::get('/{id}', 'NewsController@show')->name('news.NewsOne');
Route::get('/category/{theme}', 'NewsController@categoryNews')->name('category');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
