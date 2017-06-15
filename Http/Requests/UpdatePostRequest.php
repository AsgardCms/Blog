<?php

namespace Modules\Blog\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdatePostRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        $id = $this->route()->parameter('post')->id;

        return [
            "title" => "required",
            "slug" => "required|unique:blog__post_translations,slug,$id,post_id,locale,$this->localeKey",
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function translationMessages()
    {
        return [
            'title.required' => trans('blog::messages.title is required'),
            'slug.required' => trans('blog::messages.slug is required'),
            'slug.unique' => trans('blog::messages.slug is unique'),
        ];
    }
}
