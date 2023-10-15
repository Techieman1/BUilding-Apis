<?php

Route::get('comment', [
    'as' => 'admin.comment.index',
    'uses' => 'CommentController@index',
    'middleware' => 'can:admin.comment.index',
]);

// Route::get('comment/create', [
//     'as' => 'admin.comment.create',
//     'uses' => 'CommentController@create',
//     'middleware' => 'can:admin.comment.create',
// ]);

// Route::post('comment', [
//     'as' => 'admin.comment.store',
//     'uses' => 'CommentController@store',
//     'middleware' => 'can:admin.comment.create',
// ]);

// Route::get('comment/{id}', [
//     'as' => 'admin.comment.show',
//     'uses' => 'CommentController@show',
//     'middleware' => 'can:admin.comment.edit',
// ]);

Route::get('comment/{id}/edit', [
    'as' => 'admin.comment.edit',
    'uses' => 'CommentController@edit',
    'middleware' => 'can:admin.comment.edit',
]);

// Route::put('comment/{id}', [
//     'as' => 'admin.comment.update',
//     'uses' => 'CommentController@update',
//     'middleware' => 'can:admin.comment.edit',
// ]);

Route::delete('comment/{ids?}', [
    'as' => 'admin.comment.destroy',
    'uses' => 'CommentController@destroy',
    'middleware' => 'can:admin.comment.destroy',
]);
