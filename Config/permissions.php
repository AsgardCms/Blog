<?php

return [
    'blog.posts' => [
        'index' => trans('blog::post.list resource'),
        'create' => trans('blog::post.create resource'),
        'edit' => trans('blog::post.edit resource'),
        'destroy' => trans('blog::post.destroy resource'),
    ],
    'blog.categories' => [
        'index' => trans('blog::category.list resource'),
        'create' => trans('blog::category.create resource'),
        'edit' => trans('blog::category.edit resource'),
        'destroy' => trans('blog::category.destroy resource'),
    ],
    'blog.tags' => [
        'index' => trans('blog::tag.list resource'),
        'create' => trans('blog::tag.create resource'),
        'edit' => trans('blog::tag.edit resource'),
        'destroy' => trans('blog::tag.destroy resource'),
    ],
];
