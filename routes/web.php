<?php

Auth::routes();

Route::get('/', 'Blog\HomeController@index')->name('home');
Route::get('/category/{category}', 'Blog\CategoryController@posts')->name('category');
Route::get('/post/{post}', 'Blog\PostController@show')->name('post.show');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin'
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/posts/publish/{post}', 'PostController@publish')->name('post.publish');
        Route::resource('categories', 'CategoryController')->parameters(['categories' => 'slug']);
        Route::resource('posts', 'PostController');

    });




