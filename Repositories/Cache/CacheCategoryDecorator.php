<?php namespace Modules\Blog\Repositories\Cache;

use Modules\Blog\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{

    /**
     * Return resources translated in the given language
     *
     * @param $lang
     * @return object
     */
    public function allTranslatedIn($lang)
    {
        // TODO: Implement allTranslatedIn() method.
    }

    /**
     * Find a resource by the given slug
     *
     * @param int $slug
     * @return object
     */
    public function findBySlug($slug)
    {
        // TODO: Implement findBySlug() method.
    }
}
