<?php

return [
    'posts-per-page' => [
        'description' => trans('blog::settings.posts-per-page'),
        'view' => 'text',
        'translatable' => true
    ],
    'this-is-a-checkbox' => [
        'description' => 'This is a checkbox',
        'view' => 'checkbox',
        'translatable' => true
    ],
    'plain-non-translated-setting' => [
        'description' => 'A plain setting',
        'view' => 'text',
    ],
//    'this-is-a-textarea' => [
//        'description' => 'This is a textarea',
//        'view' => 'setting::admin.fields.translatable.textarea'
//    ],
//    'this-is-a-radio' => [
//        'description' => 'This is a radio',
//        'options' => [
//            'option1' => 'Option 1',
//            'option2' => 'Option 2',
//            'option3' => 'Option 3',
//        ],
//        'view' => 'setting::admin.fields.translatable.radio'
//    ],
//    'this-is-a-number-info' => [
//        'description' => 'This is a number input',
//        'view' => 'setting::admin.fields.translatable.number'
//    ],
];
