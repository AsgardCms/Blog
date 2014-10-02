<?php
Route::group([
    'prefix' => Config::get('core::core.admin-prefix'),
    'namespace' => 'Modules\Blog\Http\Controllers'], function () {

    Route::resource('posts', 'Admin\PostController', ['except' => ['show'], 'names' => [
        'index' => 'dashboard.post.index',
        'create' => 'dashboard.post.create',
        'store' => 'dashboard.post.store',
        'edit' => 'dashboard.post.edit',
        'update' => 'dashboard.post.update',
        'destroy' => 'dashboard.post.destroy',
    ]]);

    Route::resource('categories', 'Admin\CategoryController', ['except' => ['show'], 'names' => [
        'index' => 'dashboard.category.index',
        'create' => 'dashboard.category.create',
        'store' => 'dashboard.category.store',
        'edit' => 'dashboard.category.edit',
        'update' => 'dashboard.category.update',
        'destroy' => 'dashboard.category.destroy',
    ]]);
});

Route::group([
        'prefix' => 'api',
        'namespace' => 'Modules\Blog\Http\Controllers'], function () {
    Route::resource('tag', 'Api\TagController');
});