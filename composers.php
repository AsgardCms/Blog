<?php

view()->composer(
    config('asgard.blog.config.latest-posts', ['blog.*']),
    \Modules\Blog\Composers\Frontend\LatestPostsComposer::class
);

view()->composer([
    'blog::admin.posts.create',
    'blog::admin.posts.edit',
], \Modules\Core\Composers\CurrentUserViewComposer::class);
