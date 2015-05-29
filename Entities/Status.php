<?php namespace Modules\Blog\Entities;

/**
 * Class Status
 * @package Modules\Blog\Entities
 */
class Status
{
    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            0 => trans('blog::status.draft'),
            1 => trans('blog::status.pending review'),
            2 => trans('blog::status.published'),
            3 => trans('blog::status.unpublished'),
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->statuses;
    }
}
