<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('', 'Controller@create');
//Route::post('', 'Controller@store');
//Route::get('', 'Controller@show');
//Route::delete('', 'Controller@destroy');

Route::get('/', function () {
    //return view('welcome');
    return view('home.index');
})->name('home');

//
//
//
Route::post('webhooks', 'WebhooksController@handle');

//Auth::routes();
Route::get('/signup', 'RegistrationController@create')->name('signup');
Route::post('/signup', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::post('/logout', 'SessionsController@destroy')->name('logout');
Route::get('/password/request', 'PasswordsController@request')->name('password.request');
Route::get('/password/reset', 'PasswordsController@reset')->name('password.reset');

// ADMIN
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
//Route::get('/home', 'AuthController@home')->name('home');

//
//
//
Route::resource('accounts', 'Controller');
Route::resource('activity', 'Controller');
Route::resource('categories', 'Controller');
Route::resource('countries', 'Controller');
Route::resource('currencies', 'CurrenciesController');
Route::resource('customers', 'CustomersController');
Route::resource('emails', 'EmailsController');
Route::resource('exceptions', 'ExceptionsController');
Route::resource('favorites', 'FavoritesController');
Route::resource('forums', 'ForumsController');
Route::resource('group', 'GroupsController');
Route::resource('invoices', 'InvoicesController');
Route::resource('invoice-items', 'InvoiceItemsController');
Route::resource('issues', 'IssuesController');
Route::resource('link', 'LinksController');
Route::resource('orders', 'OrdersController');
Route::resource('pages', 'PagesController');
Route::resource('password-resests', 'PasswordResetsController');
Route::resource('payments', 'PaymentsController');
Route::resource('plans', 'PlansController');
Route::resource('posts', 'PostsController');
Route::resource('priorities', 'PrioritiesController');
Route::resource('products', 'ProductsController');
Route::resource('ratings', 'RatingsController');
Route::resource('replies', 'RepliesController');
Route::resource('sessions', 'SessionsController');
Route::resource('sources', 'SourcesController');
Route::resource('states', 'StatesController');
Route::resource('statuses', 'StatusesController');
Route::resource('subscription', 'SubscriptionsController');
Route::resource('tags', 'TagsController');
Route::resource('themes', 'ThemesController');
Route::resource('threads', 'ThreadsController');
Route::resource('transaction', 'TransactionsController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');
Route::resource('votes', 'VotesController');
