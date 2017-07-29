<?php

namespace Modules\Blog\Widgets;

use Modules\Blog\Repositories\PostRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;

class PostsWidget extends BaseWidget
{
    /**
     * @var \Modules\Blog\Repositories\PostRepository
     */
    private $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'PostsWidget';
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'blog::admin.widgets.posts';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        return ['postCount' => $this->post->all()->count()];
    }

    /**
    * Get the widget type
    * @return string
    */
    protected function options()
    {
        return [
            'width' => '2',
            'height' => '2',
            'x' => '0',
        ];
    }
}
