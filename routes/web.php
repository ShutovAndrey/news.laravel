<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::post('/new_comment', 'CommentController@create')->name('comments.add');
Route::match(['get','post'], '/profile', 'ProfileController@update')->name('profileUpdate');
Route::get('/auth/{social}', 'LoginController@loginSocial')->name('loginSocial');
Route::get('/auth/{social}/response', 'LoginController@responseSocial')->name('responseSocial');
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
    Route::get('/user/toggleAdmin/{user}', 'UserController@toggleAdmin')->name('toggleAdmin');
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::get('/rsslink', 'ParserController@create')->name('rsslink');
    Route::post('/rssStore', 'ParserController@rssStore')->name('rssStore');

    Route::resource('/user', 'UserController')->except(['show']);
    Route::resource('/news', 'News\CrudNewsController')->except(['show']);
    Route::resource('/category', 'CategoryController')->except(['show']);

});

Route::group([
    'prefix' => 'news',
    'namespace'=> 'News',
], function () {
Route::get('/', 'NewsController@index')->name('news.all');
Route::get('/{news}', 'NewsController@show')->name('news.NewsOne');
Route::get('/category/{theme}', 'NewsController@categoryNews')->name('category');
Route::post('/search', 'NewsController@search')->name('search');
});

Auth::routes();

