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

Auth::routes();

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
Route::get('/user/info', function (){
    return view('frontend.user.info');
})->name('user-info');

Route::get('/user/password', function (){
    return view('frontend.user.change-password');
})->name('user-pwd');

Route::get('/user/address', function (){
    return view('frontend.user.address');
})->name('user-address');

Route::get('/user/address-add', function (){
    return view('frontend.user.address-add');
})->name('user-address-add');

Route::get('/user/collection', function (){
    return view('frontend.user.collection');
})->name('user-collection');

