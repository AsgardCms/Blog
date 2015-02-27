<?php namespace Modules\Blog\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PostRepository extends BaseRepository
{
    /**
     * Find a file for the post by zone
     * @param string $zone
     * @param object $enity
     * @return object
     */
    public function findFileByZoneForEntity($zone, $enity);
}
