<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Post extends Model
{
    use Translatable, MediaRelation;

    public $translatedAttributes = ['title', 'slug', 'content'];
    protected $fillable = ['category_id', 'title', 'slug', 'content'];
    protected $table = 'blog__posts';

    public function category()
    {
        return $this->hasOne('Modules\Blog\Entities\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Modules\Blog\Entities\Tag', 'blog__post_tag');
    }
}
