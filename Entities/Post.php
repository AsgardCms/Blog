<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'slug', 'content'];
    protected $fillable = ['category_id'];

    public function category()
    {
        return $this->hasOne('Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
}