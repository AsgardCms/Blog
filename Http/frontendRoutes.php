<?php

if (! App::runningInConsole()) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $routes = app('Asgard.routes');
    if (isset($routes['blog'][$locale])) {
        $uri = $routes['blog'][$locale];
    } else {
        $uri = 'blog';
        if (config('app.locale_in_url')) {
            $uri = $locale . '/' . $uri;
        }
    }

    $router->get($uri, ['as' => $locale . '.blog', 'uses' => 'PublicController@index']);
    $router->get($uri . '/{slug}', ['as' => $locale . '.blog.slug', 'uses' => 'PublicController@show']);
}
