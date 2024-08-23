<?php

namespace App\Http\Requests\Profile\Post;

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
            'title' => 'required|string',
            'preview_image' => 'nullable|image',
            'main_image' => 'nullable|image',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле не должно быть пустым!',
            'preview_image.image' => 'Файл должен быть изображением!',
            'main_image.image' => 'Файл должен быть изображением!',
            'content.required' => 'Это поле не должно быть пустым!',
            'category_id.required' => 'Это поле не должно быть пустым!',
            'category_id.exists' => 'Такой категории не существует',
            'tag_ids.array' => 'Необходимо отправить массив данных',
        ];
    }
}
