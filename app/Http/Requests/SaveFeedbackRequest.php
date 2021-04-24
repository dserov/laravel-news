<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveFeedbackRequest extends FormRequest
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
            'feedback.name' => 'required|min:3',
            'feedback.content' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'feedback.name.required' => 'Мы хотим знать ваше имя!',
            'feedback.content.required' => 'Мы хотим знать ваше мнение!',
        ];
    }

}
