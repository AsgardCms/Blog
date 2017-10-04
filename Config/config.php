<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define an array of views on which to bind the $latestPosts collection
    |--------------------------------------------------------------------------
    */
    'latest-posts' => [
        'blog.*',
        'blog::admin.widgets.latest-posts',
    ],

    'post' => [
        /*
        |--------------------------------------------------------------------------
        | Partials to include on page views
        |--------------------------------------------------------------------------
        | List the partials you wish to include on the different type page views
        | The content of those fields well be caught by the PostWasCreated and PostWasEdited events
        */
        'partials' => [
            'translatable' => [
                'create' => [],
                'edit' => [],
            ],
            'normal' => [
                'create' => [],
                'edit' => [],
            ],
        ],
        /*
        |--------------------------------------------------------------------------
        | Dynamic relations
        |--------------------------------------------------------------------------
        | Add relations that will be dynamically added to the Post entity
        */
        'relations' => [
    //        'extension' => function ($self) {
    //            return $self->belongsTo(PostExtension::class, 'id', 'post_id')->first();
    //        }
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Set the sidebar position of the block menu item
    |--------------------------------------------------------------------------
    */
    'sidebar-position' => 15,
    /*
    |--------------------------------------------------------------------------
    | Array of middleware that will be applied on the page module front end routes
    |--------------------------------------------------------------------------
    */
    'middleware' => [],
];
