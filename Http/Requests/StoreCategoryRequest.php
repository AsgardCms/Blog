<?php namespace Modules\Blog\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class StoreCategoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'name' => 'required',
            'slug' => "required|unique:blog__category_translations,slug,null,category_id,locale,$this->localeKey",
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
            'name.required' => trans('blog::category.messages.name is required'),
            'slug.required' => trans('blog::category.messages.slug is required'),
            'slug.unique' => trans('blog::category.messages.slug is unique'),
        ];
    }
}
