<?php namespace Modules\Blog\Repositories;

use Illuminate\Support\Collection;
use Modules\Blog\Entities\Category;

/**
 * Interface CategoryRepository
 * @package Modules\Blog\Repositories
 */
interface CategoryRepository
{
    /**
     * Get all the categories
     * @return Collection
     */
    public function all();

    /**
     * Find a category by its ID
     * @param $id
     * @return Category
     */
    public function find($id);
}