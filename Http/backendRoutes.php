<?php

use Illuminate\Routing\Router;

$router->bind('categories', function ($id) {
    return app('Modules\Blog\Repositories\CategoryRepository')->find($id);
});
$router->bind('posts', function ($id) {
    return app('Modules\Blog\Repositories\PostRepository')->find($id);
});

$router->group(['prefix' => '/blog'], function (Router $router) {

    $router->resource('posts', 'PostController', ['except' => ['show'], 'names' => [
        'index' => 'admin.blog.post.index',
        'create' => 'admin.blog.post.create',
        'store' => 'admin.blog.post.store',
        'edit' => 'admin.blog.post.edit',
        'update' => 'admin.blog.post.update',
        'destroy' => 'admin.blog.post.destroy',
    ]]);

    $router->resource('categories', 'CategoryController', ['except' => ['show'], 'names' => [
        'index' => 'admin.blog.category.index',
        'create' => 'admin.blog.category.create',
        'store' => 'admin.blog.category.store',
        'edit' => 'admin.blog.category.edit',
        'update' => 'admin.blog.category.update',
        'destroy' => 'admin.blog.category.destroy',
    ]]);

});
