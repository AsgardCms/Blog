<?php

if (! App::runningInConsole()) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $routes = app('Asgard.routes');
    if (isset($routes['blog'][$locale])) {
        $uri = $routes['blog'][$locale];
    } else {
        $uri = 'blog';
        if (config('app.locale_in_url')) {
            $uri = $locale.'/'.$uri;
        }
    }

    $prefix = config('asgard.core.core.admin-prefix');
    $router->get($uri, ['as' => $locale.'.blog', 'uses' => 'PublicController@index'])->where('uri', "(?!$prefix).*");
    $router->get($uri.'/{slug}', ['as' => $locale.'.blog.slug', 'uses' => 'PublicController@show'])->where('uri', "(?!$prefix).*");
}
