<?php

namespace Modules\Blog\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Modules\Blog\Presenters\PostPresenter;
use Modules\Bocian\Support\MediaHelper;
use Modules\Bocian\Support\Translatable;
use Modules\Core\Traits\NamespacedEntity;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\Tag\Contracts\TaggableInterface;
use Modules\Tag\Traits\TaggableTrait;

/**
 * @property int $id
 * @property int $category_id
 * @property int $status
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property Carbon $post_date
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $og_title
 * @property string $og_description
 * @property Category $category
 * @property File|string $thumbnail
 */
class Post extends Model implements TaggableInterface
{
    use Translatable, MediaRelation, MediaHelper, PresentableTrait, NamespacedEntity, TaggableTrait;

    public $translatedAttributes = ['title', 'slug', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description',];
    protected $fillable = ['category_id', 'status', 'title', 'slug', 'content', 'post_date', 'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description',];

    protected $table = 'blog__posts';
    protected $presenter = PostPresenter::class;
    protected $casts = [
        'status' => 'int',
        'post_date' => 'datetime',
    ];
    protected static $entityNamespace = 'asgardcms/post';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the thumbnail image for the current blog post
     * @return File|string
     */
    public function getThumbnailAttribute()
    {
        $thumbnail = $this->files()->where('zone', 'thumbnail')->first();

        if ($thumbnail === null) {
            return '';
        }

        return $thumbnail;
    }

    /**
     * Check if the post is in draft
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->whereStatus(Status::DRAFT);
    }

    /**
     * Check if the post is pending review
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->whereStatus(Status::PENDING);
    }

    /**
     * Check if the post is published
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->whereStatus(Status::PUBLISHED);
    }

    /**
     * Check if the post is unpublish
     */
    public function scopeUnpublished(Builder $query): Builder
    {
        return $query->whereStatus(Status::UNPUBLISHED);
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        #i: Convert array to dot notation
        $config = implode('.', ['asgard.blog.config.post.relations', $method]);

        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
}
