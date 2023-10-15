<?php

Route::get('comment', 'CommentController@index')->name('comment.index');
Route::get('comment/{slug}', 'CommentController@show')->name('comment.show');