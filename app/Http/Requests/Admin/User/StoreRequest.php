<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'avatar' => 'nullable|image',
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer|exists:roles,id'
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'Файл должен быть изображением',
            'name.required' => 'Это поле не должно быть пустым!',
            'email.required' => 'Это поле не должно быть пустым!',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Это поле не должно быть пустым!',
            'password.min' => 'Пароль должен быть 6 или более символов',
        ];
    }
}
