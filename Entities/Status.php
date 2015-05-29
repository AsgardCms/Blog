<?php namespace Modules\Blog\Entities;

/**
 * Class Status
 * @package Modules\Blog\Entities
 */
class Status
{
    const draft = 0;
    const pending = 1;
    const published = 2;
    const unpublished = 3;

    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::draft => trans('blog::status.draft'),
            self::pending => trans('blog::status.pending review'),
            self::published => trans('blog::status.published'),
            self::unpublished => trans('blog::status.unpublished'),
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
