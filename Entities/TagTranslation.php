<?php namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];
}
