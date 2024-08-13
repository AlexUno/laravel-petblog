<?php

namespace App\Http\Requests\Admin\User;

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
            'avatar' => 'image',
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'role_id' => 'required|integer|exists:roles,id',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'Файл должен быть изображением',
            'name.required' => 'Это поле не должно быть пустым!',
            'email.required' => 'Это поле не должно быть пустым!',
            'email.unique' => 'Пользователь с таким email уже существует',
        ];
    }
}
