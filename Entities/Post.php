<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Support\Traits\MediaRelation;

class Post extends Model
{
    use Translatable, MediaRelation, PresentableTrait;

    public $translatedAttributes = ['title', 'slug', 'content'];
    protected $fillable = ['category_id', 'status', 'title', 'slug', 'content'];
    protected $table = 'blog__posts';
    protected $presenter = 'Modules\Blog\Presenters\PostPresenter';
    protected $casts = [
        'status' => 'int',
    ];

    public function category()
    {
        return $this->hasOne('Modules\Blog\Entities\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Modules\Blog\Entities\Tag', 'blog__post_tag');
    }

    /**
     * Check if the post is in draft
     * @param Builder $query
     * @return bool
     */
    public function scopeDraft(Builder $query)
    {
        return (bool) $query->whereStatus(0);
    }

    /**
     * Check if the post is pending review
     * @param Builder $query
     * @return bool
     */
    public function scopePending(Builder $query)
    {
        return (bool) $query->whereStatus(1);
    }

    /**
     * Check if the post is published
     * @param Builder $query
     * @return bool
     */
    public function scopePublished(Builder $query)
    {
        return (bool) $query->whereStatus(2);
    }

    /**
     * Check if the post is unpublish
     * @param Builder $query
     * @return bool
     */
    public function scopeUnpublished(Builder $query)
    {
        return (bool) $query->whereStatus(3);
    }
}
