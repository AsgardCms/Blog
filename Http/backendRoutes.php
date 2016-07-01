<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->bind('category', function ($id) {
    return app(\Modules\Blog\Repositories\CategoryRepository::class)->find($id);
});
$router->bind('post', function ($id) {
    return app(\Modules\Blog\Repositories\PostRepository::class)->find($id);
});

$router->bind('tag', function ($id) {
    return app(Modules\Blog\Repositories\TagRepository::class)->find($id);
});

$router->group(['prefix' => '/blog'], function (Router $router) {
    $router->get('posts', [
        'as' => 'admin.blog.post.index',
        'uses' => 'PostController@index',
        'middleware' => 'can:blog.posts.index',
    ]);
    $router->get('posts/create', [
        'as' => 'admin.blog.post.create',
        'uses' => 'PostController@create',
        'middleware' => 'can:blog.posts.create',
    ]);
    $router->post('posts', [
        'as' => 'admin.blog.post.store',
        'uses' => 'PostController@store',
        'middleware' => 'can:blog.posts.create',
    ]);
    $router->get('posts/{post}/edit', [
        'as' => 'admin.blog.post.edit',
        'uses' => 'PostController@edit',
        'middleware' => 'can:blog.posts.edit',
    ]);
    $router->put('posts/{post}', [
        'as' => 'admin.blog.post.update',
        'uses' => 'PostController@update',
        'middleware' => 'can:blog.posts.edit',
    ]);
    $router->delete('posts/{post}', [
        'as' => 'admin.blog.post.destroy',
        'uses' => 'PostController@destroy',
        'middleware' => 'can:blog.posts.destroy',
    ]);

    $router->get('categories', [
        'as' => 'admin.blog.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:blog.categories.index',
    ]);
    $router->get('categories/create', [
        'as' => 'admin.blog.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:blog.categories.create',
    ]);
    $router->post('categories', [
        'as' => 'admin.blog.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:blog.categories.create',
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.blog.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:blog.categories.edit',
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.blog.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:blog.categories.edit',
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.blog.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:blog.categories.destroy',
    ]);

    $router->get('tags', [
        'as' => 'admin.blog.tag.index',
        'uses' => 'TagController@index',
        'middleware' => 'can:blog.tags.index',
    ]);
    $router->get('tags/create', [
        'as' => 'admin.blog.tag.create',
        'uses' => 'TagController@create',
        'middleware' => 'can:blog.tags.create',
    ]);
    $router->post('tags', [
        'as' => 'admin.blog.tag.store',
        'uses' => 'TagController@store',
        'middleware' => 'can:blog.tags.create',
    ]);
    $router->get('tags/{tag}/edit', [
        'as' => 'admin.blog.tag.edit',
        'uses' => 'TagController@edit',
        'middleware' => 'can:blog.tags.edit',
    ]);
    $router->put('tags/{tag}', [
        'as' => 'admin.blog.tag.update',
        'uses' => 'TagController@update',
        'middleware' => 'can:blog.tags.edit',
    ]);
    $router->delete('tags/{tag}', [
        'as' => 'admin.blog.tag.destroy',
        'uses' => 'TagController@destroy',
        'middleware' => 'can:blog.tags.destroy',
    ]);

});
