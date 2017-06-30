<?php

Route::group(['middleware' => ['web']], function () {

// USERS
Route::get('/forums/profiles/{user}', 'NIHILCo\Forums\Controllers\ProfilesController@show');
    
// FORUMS
Route::get('/forums', 'NIHILCo\Forums\Controllers\ForumsController@index');
Route::post('/forums', 'NIHILCo\Forums\Controllers\ForumsController@store');
Route::get('/forums/threads', 'NIHILCo\Forums\Controllers\ThreadsController@index');
Route::get('/forums/create', 'NIHILCo\Forums\Controllers\ForumsController@create');
Route::get('/forums/{forum}', 'NIHILCo\Forums\Controllers\ForumsController@show');
Route::delete('/forums/{forum}', 'NIHILCo\Forums\Controllers\ForumsController@destroy');
Route::get('/forums/{forum}/edit', 'NIHILCo\Forums\Controllers\ForumsController@edit');

// THREADS
Route::post('/forums/{forum}/threads', 'NIHILCo\Forums\Controllers\ThreadsController@store');
Route::get('/forums/{forum}/threads/create', 'NIHILCo\Forums\Controllers\ThreadsController@create');
Route::get('/forums/{forum}/{thread}', 'NIHILCo\Forums\Controllers\ThreadsController@show');
Route::delete('/forums/{forum}/{thread}', 'NIHILCo\Forums\Controllers\ThreadsController@destroy');
Route::post('/forums/{forum}/{thread}/vote', 'NIHILCo\Forums\Controllers\VotesController@store');

// REPLIES
Route::post('/forums/{forum}/{thread}/replies', 'NIHILCo\Forums\Controllers\RepliesController@store');
Route::get('/forums/{forum}/{thread}/replies/create', 'NIHILCo\Forums\Controllers\RepliesController@create');
Route::get('/forums/{forum}/{thread}/{reply}', 'NIHILCo\Forums\Controllers\RepliesController@show');
Route::delete('/forums/{forum}/{thread}/{reply}', 'NIHILCo\Forums\Controllers\RepliesController@destroy');
Route::post('/forums/{forum}/{thread}/{reply}/vote', 'NIHILCo\Forums\Controllers\VotesController@store');
});