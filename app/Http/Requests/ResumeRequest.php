<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
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
            'job_title'=> 'required|min:2|max:75|string',
            'company_name'=> 'required|min:2|max:75|string',
            'description'=> 'required|string',
            'job_year'=> 'required|int',
            'experiences_or_education'=> 'required'
        ];
    }
}
