<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany('Post');
    }
}
