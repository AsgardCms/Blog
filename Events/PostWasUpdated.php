<?php

namespace Modules\Blog\Events;

class PostWasUpdated
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var int
     */
    public $postId;

    public function __construct($postId, array $data)
    {
        $this->data = $data;
        $this->postId = $postId;
    }
}
