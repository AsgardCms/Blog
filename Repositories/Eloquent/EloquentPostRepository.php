<?php namespace Modules\Blog\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;

class EloquentPostRepository implements PostRepository
{
    /**
     * Return all blog posts
     * @return Collection
     */
    public function all()
    {
        return Post::all();
    }
}