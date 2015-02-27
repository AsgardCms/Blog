<?php namespace Modules\Blog\Repositories\Cache;

use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePostDecorator extends BaseCacheDecorator implements PostRepository
{
    public function __construct(PostRepository $post)
    {
        parent::__construct();
        $this->entityName = 'posts';
        $this->repository = $post;
    }

    /**
     * Find a file for the post by zone
     * @param $zone
     * @param object $post
     * @return object
     */
    public function findFileByZoneForEntity($zone, $post)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.findFileByZone.{$zone}.{$post->id}", $this->cacheTime,
                function () use ($zone, $post) {
                    return $this->repository->findFileByZoneForEntity($zone, $post);
                }
            );
    }
}
