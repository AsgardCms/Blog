<?php

use Illuminate\Routing\Router;

$router->model('posts', 'Modules\Blog\Entities\Post');
$router->model('categories', 'Modules\Blog\Entities\Category');

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
if (! App::runningInConsole()) {
    $locale = LaravelLocalization::setLocale();
    $router->group([
            'prefix' => $locale,
            'before' => 'LaravelLocalizationRedirectFilter',
            'namespace' => 'Modules\Blog\Http\Controllers'
    ], function (Router $router) use($locale) {
        $routes = app('Asgard.routes');
        if (isset($routes['blog'][$locale])) {
            $uri = $routes['blog'][$locale];
        } else {
            $fallbackLang = Config::get('translatable::fallback_locale');
            $uri = isset($routes['blog']) ? $routes['blog'][$fallbackLang] : '';
        }
        $router->get($uri, ['as' => $locale.'.blog', 'uses' => 'PublicController@index']);
        $router->get($uri.'/{slug}', ['as' => $locale.'.blog.slug', 'uses' => 'PublicController@show']);
    });
}

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
$router->group(['prefix' => LaravelLocalization::setLocale(), 'before' => 'LaravelLocalizationRedirectFilter|auth.admin|permissions'], function(Router $router)
{
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

        $router->get('files', 'Admin\FileController@index');
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
