<?php


Route::get('/', 'Blog\HomeController@index')->name('home');


Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin'
    ],
    function () {
        Route::get('/','HomeController@index')->name('home');
        Route::resource('categories','CategoryController');
        Route::resource('posts','PostController');
    });
