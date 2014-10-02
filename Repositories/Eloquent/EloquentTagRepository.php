<?php namespace Modules\Blog\Repositories\Eloquent;

use Modules\Blog\Entities\Tag;
use Modules\Blog\Repositories\TagRepository;

class EloquentTagRepository implements TagRepository
{
    /**
     * Create a tag
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        // TODO: Implement create() method.
    }

    /**
     * Find a tag by id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * Find all tags
     * @return mixed
     */
    public function all()
    {
        return Tag::all();
    }

    /**
     * Update a tag by its ID
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }
}