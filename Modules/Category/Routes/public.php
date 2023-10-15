<?php

Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('categories', 'CategoryController@index')->name('categories.index');
?>