<?php namespace Modules\Blog\Repositories;

use Illuminate\Support\Collection;

interface CategoryRepository
{
    /**
     * Get all the categories
     * @return Collection
     */
    public function all();
}