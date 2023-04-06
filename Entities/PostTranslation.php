<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Events\PostContentIsRendering;

class PostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description',];
    protected $table = 'blog__post_translations';

    public function getContentAttribute($content)
    {
        event($event = new PostContentIsRendering($content));

        return $event->getContent();
    }
}
