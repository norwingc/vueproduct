<?php

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');

Route::resource('product', 'ProductController', ['except' => [
    'create', 'edit'
]]);

Route::resource('category', 'CategoryController', ['except' => [
    'create', 'edit'
]]);
