<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:2|max:20|string',
            'lastname' => 'required|min:2|max:25|string',
            'description' => 'required|min:2|max:255|string',
            'title'=> 'required|min:2|max:20|string',
            'image' => 'required|mimes:jpg,png,svg,jpeg|max:4096',
            'linkedin'=>'nullable|min:5|max:255|string',
            'github'=>'nullable|min:5|max:255|string'
        ];
    }
}
