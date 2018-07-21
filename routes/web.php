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

Route::get('/', 'PageController@root')->name('home');
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
Route::get('/users/password/{user}', 'UsersController@pwdEdit')->name('user.pwd.edit');
Route::post('/users/password', 'UsersController@pwdUpdate')->name('user.pwd.update');
//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/about', function (){
    return view('frontend.home.about');
})->name('about');

Route::get('/adv-business', function (){
    return view('frontend.home.adv-business');
})->name('adv-business');

Route::get('/contact', function (){
    return view('frontend.home.contact');
})->name('contact');

/* discount pages */
Route::get('/discount-list', function (){
    return view('frontend.home.discount-cate-list');
})->name('discount-list');

Route::get('/discount-details', function (){
    return view('frontend.home.discount-details');
})->name('discount-details');

/* user modular */
//Route::get('/user/info', function (){
//    return view('frontend.user.info');
//})->name('user-info');



Route::get('/user/address', function (){
    return view('frontend.user.address');
})->name('user-address');

Route::get('/user/address-add', function (){
    return view('frontend.user.address-add');
})->name('user-address-add');

Route::get('/user/collection', function (){
    return view('frontend.user.collection');
})->name('user-collection');

//Route::get('/user/info', function (){
//    return view('frontend.user.show');
//})->name('user-info');

