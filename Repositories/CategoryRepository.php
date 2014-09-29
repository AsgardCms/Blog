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

    /**
     * Create a category
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * Update a category
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * Destroy the given category
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}