<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'remember' => 'nullable|boolean'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Это поле не должно быть пустым!',
            'email.email' => 'Это поле не содержит email адреса!',
            'password.required' => 'Это поле не должно быть пустым!',
            'password.min' => 'Пароль должен быть не менее 6 символов!'
        ];
    }
}
