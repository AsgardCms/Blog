<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => trans('blog::settings.blog-slug')], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get(trans('blog::settings.posts-slug'), ['as' => $locale . '.blog', 'uses' => 'PublicController@index']);
    $router->get(trans('blog::settings.posts-slug') . '/{slug}', ['as' => $locale . '.blog.slug', 'uses' => 'PublicController@show']);
});
