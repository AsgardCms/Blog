<?php

view()->composer(config('asgard.blog.config.latest-posts', ['blog.*']), 'Modules\Blog\Composers\Frontend\LatestPostsComposer');
