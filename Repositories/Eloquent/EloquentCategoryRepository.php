<?php namespace Modules\Blog\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Modules\Blog\Entities\Category;
use Modules\Blog\Repositories\CategoryRepository;

class EloquentCategoryRepository implements CategoryRepository
{
    /**
     * Get all the categories
     * @return Collection
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * Find a category by its ID
     * @param $id
     * @return Category
     */
    public function find($id)
    {
        return Category::find($id);
    }

    /**
     * Create a category
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return Category::create($data);
    }

    /**
     * Update a category
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $category = $this->find($id);

        return $category->update($data);
    }
}