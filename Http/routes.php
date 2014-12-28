<?php

use Illuminate\Routing\Router;

$router->bind('categories', function ($id) {
    return app('Modules\Blog\Repositories\CategoryRepository')->find($id);
});
$router->bind('posts', function ($id) {
    return app('Modules\Blog\Repositories\PostRepository')->find($id);
});

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
if (! App::runningInConsole()) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->group([
            'prefix' => $locale,
            'before' => 'LaravelLocalizationRedirectFilter|public.checkLocale',
            'namespace' => 'Modules\Blog\Http\Controllers',
    ], function (Router $router) use ($locale) {
        $routes = app('Asgard.routes');
        if (isset($routes['blog'][$locale])) {
            $uri = $routes['blog'][$locale];
        } else {
            $uri = 'blog';
            if (Config::get('app.locale_in_url')) {
                $uri = $locale.'/'.$uri;
            }
        }

        $prefix = Config::get('core::core.admin-prefix');
        $router->get($uri, ['as' => $locale.'.blog', 'uses' => 'PublicController@index'])->where('uri', "(?!$prefix).*");
        $router->get($uri.'/{slug}', ['as' => $locale.'.blog.slug', 'uses' => 'PublicController@show'])->where('uri', "(?!$prefix).*");
    });
}

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
$router->group(['prefix' => LaravelLocalization::setLocale(), 'before' => 'LaravelLocalizationRedirectFilter|auth.admin|permissions'], function (Router $router) {
    $router->group(['prefix' => Config::get('core::core.admin-prefix'), 'namespace' => 'Modules\Blog\Http\Controllers'], function (Router $router) {

        $router->resource('posts', 'Admin\PostController', ['except' => ['show'], 'names' => [
            'index' => 'dashboard.post.index',
            'create' => 'dashboard.post.create',
            'store' => 'dashboard.post.store',
            'edit' => 'dashboard.post.edit',
            'update' => 'dashboard.post.update',
            'destroy' => 'dashboard.post.destroy',
        ]]);

        $router->resource('categories', 'Admin\CategoryController', ['except' => ['show'], 'names' => [
            'index' => 'dashboard.category.index',
            'create' => 'dashboard.category.create',
            'store' => 'dashboard.category.store',
            'edit' => 'dashboard.category.edit',
            'update' => 'dashboard.category.update',
            'destroy' => 'dashboard.category.destroy',
        ]]);

    });

});

/*
|--------------------------------------------------------------------------
| Api routes
|--------------------------------------------------------------------------
*/
$router->group(['prefix' => 'api', 'namespace' => 'Modules\Blog\Http\Controllers'], function (Router $router) {
    $router->resource('tag', 'Api\TagController');
    $router->get('tag/findByName/{name}', 'Api\TagController@findByName');
});
