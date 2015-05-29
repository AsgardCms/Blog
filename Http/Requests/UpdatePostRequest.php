<?php namespace Modules\Blog\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdatePostRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        $id = $this->route()->getParameter('posts')->id;
        return [
            "title" => "required",
            "slug" => "required|unique:blog__post_translations,slug,$id,post_id,locale,$this->localeKey",
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
}
