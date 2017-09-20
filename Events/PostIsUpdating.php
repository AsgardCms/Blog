<?php

namespace Modules\Blog\Events;

use Modules\Blog\Entities\Post;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class PostIsUpdating extends AbstractEntityHook implements EntityIsChanging
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post, array $data)
    {
        parent::__construct($data);

        $this->post = $post;
    }

    /**
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
