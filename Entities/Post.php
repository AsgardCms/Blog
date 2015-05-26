<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Support\Traits\MediaRelation;

class Post extends Model
{
    use Translatable, MediaRelation, PresentableTrait;

    public $translatedAttributes = ['title', 'slug', 'content'];
    protected $fillable = ['category_id', 'title', 'slug', 'content'];
    protected $table = 'blog__posts';
    protected $presenter = 'Modules\Blog\Presenters\PostPresenter';

    public function category()
    {
        return $this->hasOne('Modules\Blog\Entities\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Modules\Blog\Entities\Tag', 'blog__post_tag');
    }
}
