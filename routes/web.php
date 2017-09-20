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
Route::post('webhooks/stripe', 'WebhooksController@handleStripeWebhook');

//Auth::routes();
Route::get('/signup', 'RegistrationController@create')->name('signup');
Route::post('/signup', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::post('/logout', 'SessionsController@destroy')->name('logout');
Route::get('/password/request', 'PasswordsController@request')->name('password.request');
Route::get('/password/reset', 'PasswordsController@reset')->name('password.reset');
Route::get('/about', 'HomeController@about');
Route::get('/tenth-anniversary', 'HomeController@tenth');
Route::get('/10', 'HomeController@tenth');
Route::get('/10th', 'HomeController@tenth');
Route::get('/downloads', 'HomeController@downloads');

//
Route::get('/donate', 'PaymentsController@donate');
Route::post('/donate', 'PaymentsController@processDonation');

//

Route::get('/apply', 'ApplicationsController@index');
Route::get('/nominate', 'NominationsController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');
Route::post('/tickets/buy', 'TicketsController@buy');

// ADMIN
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
//Route::get('/home', 'AuthController@home')->name('home');

// FORUMS
Route::get('/forums', 'ForumsController@index')->name('forums');
Route::get('/forums/create', 'ForumsController@create');
Route::get('/forums/threads', 'ThreadsController@index');
Route::get('/forums/{forum}', 'ForumsController@show');
Route::post('/forums', 'ForumsController@store');
Route::post('/forums/{forum}/threads', 'ThreadsController@store');
Route::delete('/forums/{forum}', 'ForumsController@destroy');
Route::get('/forums/{forum}/threads/create', 'ThreadsController@create');
Route::get('/forums/{forum}/{thread}', 'ThreadsController@show');
Route::patch('/forums/{forum}/{thread}', 'ThreadsController@update');
Route::delete('/forums/{forum}/{thread}', 'ThreadsController@destroy');
Route::get('/forums/{forum}/{thread}/edit', 'ThreadsController@edit');
Route::get('/forums/{forum}/{thread}/{reply}', 'RepliesController@show');

// ISSUES
Route::get('/issues', 'IssuesController@index');
Route::get('/issues/create', 'IssuesController@create');
Route::get('/issues/{issue}', 'IssuesController@show');
Route::delete('/issues/{issue}', 'IssuesController@destroy');
Route::post('/issues', 'IssuesController@store');

// User
Route::get('/users/{user}/notifications', 'NotificationsController@index');

// Invoice
Route::post('/invoices/{invoice}/pay', 'InvoicesController@pay');

//
//
//
Route::resource('accounts', 'AccountsController');
Route::resource('activities', 'ActivitiesController');
Route::resource('addresses', 'AddressesController');
Route::resource('authors', 'AuthorsController');
Route::resource('books', 'BooksController');
Route::resource('categories', 'CategoriesController');
Route::resource('countries', 'CountriesController');
Route::resource('currencies', 'CurrenciesController');
Route::resource('customers', 'CustomersController');
Route::resource('editions', 'EditionsController');
Route::resource('emails', 'EmailsController');
Route::resource('exceptions', 'ExceptionsController');
Route::resource('favorites', 'FavoritesController');
Route::resource('follows', 'FollowsController');
Route::resource('groups', 'GroupsController');
Route::resource('invoices', 'InvoicesController');
Route::resource('links', 'LinksController');
Route::resource('notifications', 'NotificationsController');
Route::resource('orders', 'OrdersController');
Route::resource('pages', 'PagesController');
Route::resource('password-resests', 'PasswordResetsController');
Route::resource('payments', 'PaymentsController');
Route::resource('plans', 'PlansController');
Route::resource('posts', 'PostsController');
Route::resource('priorities', 'PrioritiesController');
Route::resource('products', 'ProductsController');
Route::resource('publishers', 'PublishersController');
Route::resource('ratings', 'RatingsController');
Route::resource('regions', 'RegionsController');
Route::resource('replies', 'RepliesController');
Route::resource('resolutions', 'ResolutionsController');
//Route::resource('sessions', 'SessionsController');
Route::resource('sources', 'SourcesController');
Route::resource('statuses', 'StatusesController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::resource('tags', 'TagsController');
Route::resource('themes', 'ThemesController');
Route::resource('threads', 'ThreadsController');
Route::resource('transactions', 'TransactionsController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');
Route::resource('votes', 'VotesController');
