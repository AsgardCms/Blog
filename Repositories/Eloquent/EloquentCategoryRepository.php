<?php namespace Modules\Blog\Repositories\Eloquent;

use Modules\Blog\Entities\Category;
use Modules\Blog\Repositories\CategoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
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
