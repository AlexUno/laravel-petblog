<?php

namespace App\Http\Requests\Profile;

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
            'avatar' => 'nullable|image',
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'Файл должен быть изображением',
            'name.required' => 'Это поле не должно быть пустым!',
        ];
    }
}
