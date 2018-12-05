<?php

// Home Route
Route::get('/', 'PostController@index');

// -=-=-=-=-=-=-=-=-=

// Post Routes
Route::get('post/create', 'PostController@create');
Route::get('post/{post}', 'PostController@show');
Route::post('post', 'PostController@store');
Route::delete('post/{post}', 'PostController@destroy');

// -=-=-=-=-=-=-=-=-=

// Category Routes
Route::get('category/create', 'CategoryController@create');
Route::get('category/{category}', 'CategoryController@show');
Route::post('category', 'CategoryController@store');
Route::delete('category/{category}', 'CategoryController@destroy');

// -=-=-=-=-=-=-=-=-=

// Comment Routes
Route::post('post/{post}/comment', 'CommentController@store');
Route::delete('comment/{comment}', 'CommentController@destroy');

// -=-=-=-=-=-=-=-=-=

// Admin Routes
Route::get('admin', 'AdminController@index');
Route::get('admin/profile', 'AdminController@show');
Route::patch('admin/profile', 'AdminController@update');
Route::get('logout', 'AdminController@destroy');
Route::post('admin', 'AdminController@store');

