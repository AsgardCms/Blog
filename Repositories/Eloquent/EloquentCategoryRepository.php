<?php namespace Modules\Blog\Repositories\Eloquent;

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
     * @param Category $category
     * @param array $data
     * @return mixed
     */
    public function update($category, $data)
    {
        $translatableData = Helper::separateLanguages($data);

        Helper::updateTranslated($category, $translatableData);

        return $category;
    }

    /**
     * Return all categories in the given language
     * @param $lang
     * @return mixed
     */
    public function allTranslatedIn($lang)
    {
        return $this->model->whereHas('translations', function($q) use($lang)
        {
            $q->where('locale', "$lang");
        })->get();
    }
}
