<?php

namespace Modules\Blog\Events;

class PostWasDeleted
{
    /**
     * @var object
     */
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }
}
