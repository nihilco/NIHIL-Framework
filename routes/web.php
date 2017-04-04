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

//Auth::routes();
Route::get('/signup', 'RegistrationController@create')->name('signup');
Route::post('/signup', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::post('/logout', 'SessionsController@destroy')->name('logout');
Route::get('/password/request', 'PasswordsController@request')->name('password.request');
Route::get('/password/reset', 'PasswordsController@reset')->name('password.reset');


Route::get('/astral-shoe-fundraiser', 'HomeController@astral')->name('astral');
Route::post('/astral-shoe-fundraiser', 'HomeController@process');
Route::get('/confirm', 'HomeController@confirm')->name('confirm');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/mission', 'HomeController@mission')->name('mission');
Route::get('/newsletters', 'HomeController@newsletters')->name('newsletters');
Route::get('/partners', 'HomeController@partners')->name('partners');
Route::get('/contact', 'HomeController@contact')->name('contact');

// WEBHOOKS
Route::post('/stripe/webhooks', 'WebhooksController@handle');

// ADMIN
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
//Route::get('/home', 'AuthController@home')->name('home');

// INVOICES
Route::get('/invoices/create', 'InvoicesController@create');
Route::post('/invoices', 'InvoicesController@store');
Route::get('/invoices', 'InvoicesController@index');
Route::get('/invoices/{invoice}', 'InvoicesController@show');
Route::delete('/invoices/{invoice}', 'InvoicesController@destroy');

// CUSTOMERS
Route::get('/customers/create', 'CusotmersController@create');
Route::post('/customers', 'CustomersController@store');
Route::get('/customers', 'CustomersController@index');
Route::get('/customers/{customer}', 'CustomersController@show');
Route::delete('/customers/{customer}', 'CustomersController@destroy');

// CATEGORIES
Route::get('/categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{category}', 'CategoriesController@show');
Route::delete('/categories/{category}', 'CategoriesController@destroy');

// TAGS
Route::get('/tags/create', 'TagsController@create');
Route::post('/tags', 'TagsController@store');
Route::get('/tags', 'TagsController@index');
Route::get('/tags/{tag}', 'TagsController@show');
Route::delete('/tags/{tag}', 'TagsController@destroy');

// ACCOUNTS
Route::get('/accounts/create', 'AccountsController@create');
Route::post('/accounts', 'AccountsController@store');
Route::get('/accounts', 'AccountsController@index');
Route::get('/accounts/{account}', 'AccountsController@show');
Route::delete('/accounts/{account}', 'AccountsController@destroy');

// PRODUCTS
Route::get('/products/create', 'ProductsController@create');
Route::post('/products', 'ProductsController@store');
Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');
Route::delete('/products/{product}', 'ProductsController@destroy');

// PAYMENTS
Route::get('/payments/create', 'PaymentsController@create');
Route::post('/payments', 'PaymentsController@store');
Route::get('/payments', 'PaymentsController@index');
Route::get('/payments/{payment}', 'PaymentsController@show');
Route::delete('/payments/{payment}', 'PaymentsController@destroy');
Route::get('/payments/make', 'PaymentsController@make');
Route::get('/donate', 'PaymentsController@donate');
Route::post('/donate', 'PaymentsController@process');

// USERS
Route::get('/users/create', 'UsersController@create');
Route::post('/users', 'UsersController@store');
Route::get('/users', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show');
Route::delete('/users/{user}', 'UsersController@destroy');

// PLANS
Route::get('/plans/create', 'PlansController@create');
Route::post('/plans', 'PlansController@store');
Route::get('/plans', 'PlansController@index');
Route::get('/plans/{plan}', 'PlansController@show');
Route::delete('/plans/{plan}', 'PlansController@destroy');

// SUBSCRIPTIONS
Route::get('/subscriptions/create', 'Controller@create');
Route::post('/subscriptions', 'SubscriptionsController@store');
Route::get('/subscriptions', 'SubscriptionsController@index');
Route::get('/subscriptions/{subscription}', 'SubscriptionsController@show');
Route::delete('/subscriptions/{subscription}', 'SubscriptionsController@destroy');

// POSTS
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');
Route::delete('posts/{post}', 'PostsController@destroy');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::delete('/comments/{comment}', 'CommentsController@destroy');
Route::get('/blog', 'PostsController@blog');
Route::get('/comments', 'CommentsController@index');

// TICKETS
Route::get('/tickets/create', 'TicketsController@create');
Route::post('/tickets' ,'TicketsController@store');
Route::get('/tickets' ,'TicketsController@index');
Route::get('/tickets/{ticket}', 'TicketsController@show');
Route::get('/tickets', 'TicketsController@index');

Route::post('/tickets/{ticket}/reply', 'RepliesController@store');
Route::delete('/tickets/replies/{reply}', 'RepliesController@destroy');

Route::get('/types/create', 'TypesController@create');
Route::post('/types', 'TypesController@store');
Route::get('/types', 'TypesController@index');
Route::get('/types/{type}', 'TypesController@show');
Route::delete('/types/{type}', 'TypesController@destroy');

Route::get('/priorities/create', 'PrioritiesController@create');
Route::post('/priorities', 'PrioritiesController@store');
Route::get('/priorities', 'PrioritiesController@index');
Route::get('/priorities/{priority}', 'PrioritiesController@show');
Route::delete('/priorities/{priority}', 'PrioritiesController@destroy');

Route::get('/resolutions/create', 'ResolutionsController@create');
Route::post('/resolutions', 'ResolutionsController@store');
Route::get('/resolutions', 'ResolutionsController@index');
Route::get('/resolutions/{resolution}', 'ResolutionsController@show');
Route::delete('/resolutions/{resolution}', 'ResolutionsController@destroy');

Route::get('/statuses/create', 'StatusesController@create');
Route::post('/statuses', 'StatusesController@store');
Route::get('/statuses', 'StatusesController@index');
Route::get('/statuses/{status}', 'StatusesController@show');
Route::delete('/statuses/{status}', 'StatusesController@destroy');

// PAGES
Route::get('/pages/create', 'PagesController@create');
Route::post('/pages', 'PagesController@store');
Route::get('/pages', 'PagesController@index');
//Route::get('{page}', 'PagesController@show');
