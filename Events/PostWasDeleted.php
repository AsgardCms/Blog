<?php

namespace Modules\Blog\Events;

class PostWasDeleted
{
    /**
     * @var int
     */
    public $postId;

    public function __construct($postId)
    {
        $this->postId = $postId;
    }
}
