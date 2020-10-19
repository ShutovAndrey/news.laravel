<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::match(['get','post'], '/profile', 'ProfileController@update')->name('profileUpdate');

Route::group([
    'prefix' => 'admin',
    'namespace'=> 'Admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'IndexController')->name('home');

  //  Route::match(['get','post'], '/add', 'News\NewsController@add')->name('add');
   // Route::get('/edit/{news}', 'News\NewsController@edit')->name('edit');
   // Route::post('/update/{news}', 'News\NewsController@update')->name('update');
  //  Route::get('/destroy/{news}', 'News\NewsController@destroy')->name('destroy');
  //  Route::get('/index', 'News\NewsController@index')->name('index');
    Route::resource('/news', 'News\CrudNewsController')->except(['show']);

    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/categories/edit/', 'CategoryController@edit')->name('category.edit');
    Route::get('/categories/destroy/{category}', 'CategoryController@destroy')->name('category.destroy');
    Route::post('/categories/update', 'CategoryController@update')->name('category.update');

});

Route::group([
    'prefix' => 'news',
    'namespace'=> 'News',
], function () {
Route::get('/', 'NewsController@index')->name('news.all');
Route::get('/{news}', 'NewsController@show')->name('news.NewsOne');
Route::get('/category/{theme}', 'NewsController@categoryNews')->name('category');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
