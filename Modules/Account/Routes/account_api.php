<?php
use Illuminate\Support\Facades\Route;

// Replace with your desired route prefix and middleware
Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {
    // Route for getting a list of authors
    Route::get('/authors', 'Modules\Account\Http\Api\AccountAuthorsController@index');

    // Route for creating a new author
    Route::post('/authors', 'Modules\Account\Http\Api\AccountAuthorsController@store');

    // Route for showing the form to create a new author (optional)
    Route::get('/authors/create', 'Modules\Account\Http\Api\AccountAuthorsController@create');

    // Route for showing the form to edit an author
    Route::get('/authors/{id}/edit', 'Modules\Account\Http\Api\AccountAuthorsController@edit');

    // Route for updating an author
    Route::put('/authors/{id}', 'Modules\Account\Http\Api\AccountAuthorsController@update');
});
