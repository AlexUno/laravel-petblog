<?php

namespace App\Http\Requests\Post\Comment;

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
            'message' => 'required|string|min:5'
        ];
    }

    public function messages()
    {
        return [
          'message.required' => 'Это поле должно быть заполнено!',
          'message.min' => 'Минимальная длинна должна быть 5 символов'
        ];
    }
}
