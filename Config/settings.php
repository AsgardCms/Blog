<?php

return [
    'posts-per-page' => [
        'description' => trans('blog::settings.posts-per-page'),
        'view' => 'setting::admin.partials.module-text-field'
    ],
    'this-is-a-checkbox' => [
        'description' => 'This is a checkbox',
        'view' => 'setting::admin.partials.module-checkbox-field'
    ],
    'this-is-a-textarea' => [
        'description' => 'This is a textarea',
        'view' => 'setting::admin.partials.module-textarea-field'
    ],
];
