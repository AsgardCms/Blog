<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => trans('blog::slugs.blog')], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get(trans('blog::slugs.posts'), ['as' => $locale . '.blog', 'uses' => 'PublicController@index']);
    $router->get(trans('blog::slugs.posts') . '/{slug}', ['as' => $locale . '.blog.slug', 'uses' => 'PublicController@show']);
});
