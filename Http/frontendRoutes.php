<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => 'blog'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('posts', ['as' => $locale . '.blog', 'uses' => 'PublicController@index']);
    $router->get('posts/{slug}', ['as' => $locale . '.blog.slug', 'uses' => 'PublicController@show']);
});
