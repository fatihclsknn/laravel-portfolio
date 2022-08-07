<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailRequest extends FormRequest
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
            'name' => 'required|min:2|max:80|string',
            'contents' => 'required',
            'web_site'=> 'required|min:2|max:75|string',
            'image' => 'required|mimes:jpg,png,svg,jpeg|max:4096',
        ];
    }
}
