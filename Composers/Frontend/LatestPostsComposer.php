<?php

namespace Modules\Blog\Composers\Frontend;

use Illuminate\Contracts\View\View;
use Modules\Blog\Repositories\PostRepository;
use Modules\Setting\Contracts\Setting;

class LatestPostsComposer
{
    /**
     * @var PostRepository
     */
    private $post;
    /**
     * @var Setting
     */
    private $setting;

    public function __construct(PostRepository $post, Setting $setting)
    {
        $this->post = $post;
        $this->setting = $setting;
    }

    public function compose(View $view)
    {
        $limit = $this->setting->get('blog::latest-posts-amount', locale(), 5);

        $view->with('latestPosts', $this->post->latest($limit));
    }
}
