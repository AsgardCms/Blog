<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $fillable = ['name', 'slug'];
    public $translatedAttributes = ['name', 'slug'];
    protected $table = 'blog__tags';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog__post_tag');
    }
}
