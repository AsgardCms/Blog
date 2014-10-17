<?php namespace Modules\Blog\Repositories;

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
