<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password'=>['required','string','confirmed',Password::min(6)->letters()->mixedCase()->symbols()->numbers()],
        ];
    }
}
