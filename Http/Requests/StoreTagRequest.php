<?php namespace Modules\Blog\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class StoreTagRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'name' => "required|unique:blog__tag_translations,name,null,tag_id,locale,$this->localeKey",
            'slug' => "required|unique:blog__tag_translations,slug,null,tag_id,locale,$this->localeKey",
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [
            'name.required' => trans('blog::tag.messages.name is required'),
            'name.unique' => trans('blog::tag.messages.name is unique'),
            'slug.required' => trans('blog::tag.messages.slug is required'),
            'slug.unique' => trans('blog::tag.messages.slug is unique'),
        ];
    }
}
