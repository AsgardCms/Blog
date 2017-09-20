<?php

namespace Modules\Blog\Repositories\Cache;

use Modules\Blog\Repositories\TagRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTagDecorator extends BaseCacheDecorator implements TagRepository
{
    /**
     * @var TagRepository
     */
    protected $repository;

    public function __construct(TagRepository $tag)
    {
        parent::__construct();
        $this->entityName = 'tags';
        $this->repository = $tag;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        return $this->cache
            ->tags([$this->entityName, 'global'])
            ->remember(
                "{$this->locale}.{$this->entityName}.findByName.{$name}",
                $this->cacheTime,
                function () use ($name) {
                    return $this->repository->findByName($name);
                }
            );
    }

    /**
     * Create the tag for the specified language
     *
     * @param  string $lang
     * @param  array  $name
     * @return mixed
     */
    public function createForLanguage($lang, $name)
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->createForLanguage($lang, $name);
    }
}
