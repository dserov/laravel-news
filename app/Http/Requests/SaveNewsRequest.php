<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveNewsRequest extends FormRequest
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
            'news.title' => 'required',
            'news.content' => '',
            'news.source' => 'active_url',
            'news.spoiler' => 'required',
            'news.category_id' => 'required|exists:categories,id',
            'news.is_private' => '',
        ];
    }

    public function messages()
    {
        return [
            'news.title.required' => 'Заголовок обязателен',
            'news.spoiler.required' => 'Спойлер обязателен',
            'news.category_id.required' => 'Категория обязательна',
            'news.source.active_url' => 'Доложен быть валидный URL',
        ];
    }

    protected function prepareForValidation()
    {
        // checkbox problem workaround :)
        $input = $this->input('news');
        $input['is_private'] = $input['is_private'] ?? '0';
        $this->merge([
            'news' => $input
        ]);
    }
}
