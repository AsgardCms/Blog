<?php

namespace Modules\Blog\Events;

use Modules\Media\Contracts\StoringMedia;

class PostWasCreated implements StoringMedia
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

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->postId;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
