<?php namespace Modules\Blog\Repositories\Cache;

use Modules\Blog\Repositories\Collection;
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
     * Return the latest x blog posts
     * @param int $amount
     * @return Collection
     */
    public function latest($amount = 5)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.latest.{$amount}", $this->cacheTime,
                function () use ($amount) {
                    return $this->repository->latest($amount);
                }
            );
    }
}
