<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => 'v1/blog', 'middleware' => 'api.token'], function (Router $router) {
    $router->get('categories', [
        'as' => 'api.blog.category.index',
        'uses' => 'V1\CategoryController@index',
        'middleware' => 'token-can:blog.categories.index',
    ]);

    $router->post('categories', [
        'as' => 'api.blog.category.store',
        'uses' => 'V1\CategoryController@store',
        'middleware' => 'token-can:blog.categories.create',
    ]);

    $router->post('categories/{category}', [
        'as' => 'api.blog.category.update',
        'uses' => 'V1\CategoryController@update',
        'middleware' => 'token-can:blog.categories.edit',
    ]);

    $router->delete('categories/{category}', [
        'as' => 'api.blog.category.destroy',
        'uses' => 'V1\CategoryController@destroy',
        'middleware' => 'token-can:blog.categories.destroy',
    ]);
});
