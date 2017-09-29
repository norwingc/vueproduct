<?php

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');

Route::resource('product', 'ProductController');
