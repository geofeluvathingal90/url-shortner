<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'link' => 'required|url|unique:short_links', 
            ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'link.required' => __('short_link.link.required'),
            'link.url' => __('short_link.link.url'),
            'link.unique' => __('short_link.link.unique'),
          ];
    }
}
