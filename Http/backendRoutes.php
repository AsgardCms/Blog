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
    $router->get('posts', ['as' => 'admin.blog.post.index', 'uses' => 'PostController@index']);
    $router->get('posts/create', ['as' => 'admin.blog.post.create', 'uses' => 'PostController@create']);
    $router->post('posts', ['as' => 'admin.blog.post.store', 'uses' => 'PostController@store']);
    $router->get('posts/{post}/edit', ['as' => 'admin.blog.post.edit', 'uses' => 'PostController@edit']);
    $router->put('posts/{post}', ['as' => 'admin.blog.post.update', 'uses' => 'PostController@update']);
    $router->delete('posts/{post}', ['as' => 'admin.blog.post.destroy', 'uses' => 'PostController@destroy']);

    $router->get('categories', ['as' => 'admin.blog.category.index', 'uses' => 'CategoryController@index']);
    $router->get('categories/create', ['as' => 'admin.blog.category.create', 'uses' => 'CategoryController@create']);
    $router->post('categories', ['as' => 'admin.blog.category.store', 'uses' => 'CategoryController@store']);
    $router->get('categories/{category}/edit', ['as' => 'admin.blog.category.edit', 'uses' => 'CategoryController@edit']);
    $router->put('categories/{category}', ['as' => 'admin.blog.category.update', 'uses' => 'CategoryController@update']);
    $router->delete('categories/{category}', ['as' => 'admin.blog.category.destroy', 'uses' => 'CategoryController@destroy']);

    $router->get('tags', ['as' => 'admin.blog.tag.index', 'uses' => 'TagController@index']);
    $router->get('tags/create', ['as' => 'admin.blog.tag.create', 'uses' => 'TagController@create']);
    $router->post('tags', ['as' => 'admin.blog.tag.store', 'uses' => 'TagController@store']);
    $router->get('tags/{tag}/edit', ['as' => 'admin.blog.tag.edit', 'uses' => 'TagController@edit']);
    $router->put('tags/{tag}', ['as' => 'admin.blog.tag.update', 'uses' => 'TagController@update']);
    $router->delete('tags/{tag}', ['as' => 'admin.blog.tag.destroy', 'uses' => 'TagController@destroy']);

});
