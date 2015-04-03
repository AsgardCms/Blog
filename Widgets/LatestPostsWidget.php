<?php namespace Modules\Blog\Widgets;

use Modules\Blog\Repositories\PostRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;

class LatestPostsWidget extends BaseWidget
{
    /**
     * @var PostRepository
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
        return get_class();
    }

    /**
     * Get the widget options
     * Possible options:
     *  x, y, width, height
     * @return string
     */
    protected function options()
    {
        return [
            'width' => '3',
            'height' => '3',
            'x' => '0',
            'y' => '0',
        ];
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'blog::admin.widgets.latest-posts';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        return ['posts' => $this->post->all()];
    }
}
