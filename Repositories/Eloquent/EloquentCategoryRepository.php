<?php namespace Modules\Blog\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Modules\Blog\Entities\Category;
use Modules\Blog\Repositories\CategoryRepository;
use Modules\Core\Internationalisation\Helper;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
    /**
     * Create a category
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        Helper::createTranslatedFields('Modules\Blog\Entities\Category', $data);
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

        Helper::saveTranslated($category, $data);

        return $category;
    }
}