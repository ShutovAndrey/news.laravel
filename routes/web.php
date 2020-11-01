<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::get('/auth/{social}', 'LoginController@loginSocial')->name('loginSocial');
Route::get('/auth/{social}/response', 'LoginController@responseSocial')->name('responseSocial');
Route::match(['get','post'], '/profile', 'ProfileController@update')->name('profileUpdate');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group([
    'prefix' => 'admin',
    'namespace'=> 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/', 'IndexController')->name('home');
    Route::get('/users/toggleAdmin/{user}', 'UsersController@toggleAdmin')->name('toggleAdmin');
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::get('/rsslink', 'ParserController@create')->name('rsslink');
    Route::post('/rssStore', 'ParserController@rssStore')->name('rssStore');
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/destroy/{user}', 'UsersController@destroy')->name('users.destroy');
    Route::get('/users/edit/{user}', 'UsersController@edit')->name('users.edit');
    Route::get('/users/update/{user}', 'UsersController@update')->name('users.update');

    Route::resource('/news', 'News\CrudNewsController')->except(['show']);

    Route::get('/categories', 'CategoryController@index')->name('category.index'); //собрать все это в ресурс
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
