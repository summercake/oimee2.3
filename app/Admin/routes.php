<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    /* 用户管理模块 */
    $router->get('users', 'UsersController@index');
    /* 分类管理模块 */
    $router->get('categories', 'CategoriesController@index');
    $router->get('categories/create', 'CategoriesController@create');
    $router->post('categories', 'CategoriesController@store');
    $router->get('categories/{id}/edit', 'CategoriesController@edit');
    $router->put('categories/{id}', 'CategoriesController@update');
    $router->delete('categories/{id}', 'CategoriesController@destroy');
    /* 广告模块 */
    $router->get('advertisements', 'AdvertisementsController@index');
    $router->get('advertisements/create', 'AdvertisementsController@create');
    $router->post('advertisements', 'AdvertisementsController@store');
    $router->get('advertisements/{id}/edit', 'AdvertisementsController@edit');
    $router->put('advertisements/{id}', 'AdvertisementsController@update');
    $router->delete('advertisements/{id}', 'AdvertisementsController@destroy');
    /* 折扣模块 */
    $router->get('discounts', 'DiscountsController@index');
    $router->get('discounts/create', 'DiscountsController@create');
    $router->post('discounts', 'DiscountsController@store');
    $router->get('discounts/{id}/edit', 'DiscountsController@edit');
    $router->put('discounts/{id}', 'DiscountsController@update');
    $router->delete('discounts/{id}', 'DiscountsController@destroy');
});