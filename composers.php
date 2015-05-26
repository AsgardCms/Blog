<?php

view()->composer('partials.sidebar-nav', 'Modules\Blog\Composers\SidebarViewComposer');

view()->composer('blog.*', 'Modules\Blog\Composers\Frontend\LatestPostsComposer');
