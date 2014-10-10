<?php namespace Modules\Blog\Repositories;

use Illuminate\Support\Collection;
use Modules\Blog\Entities\Category;
use Modules\Core\Repositories\BaseRepository;

/**
 * Interface CategoryRepository
 * @package Modules\Blog\Repositories
 */
interface CategoryRepository extends BaseRepository
{
    /**
     * Return resources translated in the given language
     * @param $lang
     * @return mixed
     */
    public function allTranslatedIn($lang);
}