<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Bocian\Support\Translatable;

class Category extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'slug'];
    protected $fillable = ['name', 'slug'];
    protected $table = 'blog__categories';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
