<?php namespace Modules\Blog\Composers\Frontend;

use Illuminate\Contracts\View\View;
use Modules\Blog\Repositories\PostRepository;

class LatestPostsComposer
{
    /**
     * @var PostRepository
     */
    private $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function compose(View $view)
    {
        $view->with('latestPosts', $this->post->latest());
    }
}
