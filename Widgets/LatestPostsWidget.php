<?php

namespace Modules\Blog\Widgets;

use Modules\Blog\Repositories\PostRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;
use Modules\Setting\Contracts\Setting;

class LatestPostsWidget extends BaseWidget
{
    /**
     * @var PostRepository
     */
    private $post;

    public function __construct(PostRepository $post, Setting $setting)
    {
        $this->post = $post;
        $this->setting = $setting;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'LatestPostsWidget';
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
            'width' => '4',
            'height' => '4',
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
        $limit = $this->setting->get('blog::widget-posts-amount', locale(), 5);

        return ['latestPosts' => $this->post->latest($limit)];
    }
}
