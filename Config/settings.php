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
    'this-is-a-radio' => [
        'description' => 'This is a radio',
        'options' => [
            'option1' => 'Option 1',
            'option2' => 'Option 2',
            'option3' => 'Option 3',
        ],
        'view' => 'setting::admin.partials.module-radio-field'
    ],
    'this-is-a-number-info' => [
        'description' => 'This is a number input',
        'view' => 'setting::admin.partials.module-number-field'
    ],
];
