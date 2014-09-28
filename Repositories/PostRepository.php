<?php namespace Modules\Blog\Repositories;

use Illuminate\Support\Collection;

interface PostRepository
{
    /**
     * Return all blog posts
     * @return Collection
     */
    public function all();
}