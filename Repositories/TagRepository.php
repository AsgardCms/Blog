<?php namespace Modules\Blog\Repositories;

/**
 * Interface TagRepository
 * @package Modules\Blog\Repositories
 */
interface TagRepository
{
    /**
     * Create a tag
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * Find a tag by id
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find all tags
     * @return mixed
     */
    public function all();

    /**
     * Update a tag by its ID
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);
}