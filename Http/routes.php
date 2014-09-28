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
});