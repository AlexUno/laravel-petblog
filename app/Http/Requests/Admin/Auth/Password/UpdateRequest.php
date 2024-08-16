<?php

namespace App\Http\Requests\Admin\Auth\Password;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'Токен не должен быть пустым',
            'email.required' => 'Это поле не должно быть пустым!',
            'email.exists' => 'Такого пользователя нет'
        ];
    }
}
