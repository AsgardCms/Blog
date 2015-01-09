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
    $router->group(['prefix' => Config::get('core::core.admin-prefix').'/blog', 'namespace' => 'Modules\Blog\Http\Controllers'], function (Router $router) {

        $router->resource('posts', 'Admin\PostController', ['except' => ['show'], 'names' => [
            'index' => 'admin.blog.post.index',
            'create' => 'admin.blog.post.create',
            'store' => 'admin.blog.post.store',
            'edit' => 'admin.blog.post.edit',
            'update' => 'admin.blog.post.update',
            'destroy' => 'admin.blog.post.destroy',
        ]]);

        $router->resource('categories', 'Admin\CategoryController', ['except' => ['show'], 'names' => [
            'index' => 'admin.blog.category.index',
            'create' => 'admin.blog.category.create',
            'store' => 'admin.blog.category.store',
            'edit' => 'admin.blog.category.edit',
            'update' => 'admin.blog.category.update',
            'destroy' => 'admin.blog.category.destroy',
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
