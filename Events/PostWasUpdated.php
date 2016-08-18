<?php

namespace Modules\Blog\Events;

use Modules\Blog\Entities\Post;
use Modules\Media\Contracts\StoringMedia;

class PostWasUpdated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var Post
     */
    public $post;

    public function __construct(Post $post, array $data)
    {
        $this->data = $data;
        $this->post = $post;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->post;
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
