<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequestRequest extends FormRequest
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
            'export.name' => '',
            'export.phone' => '',
            'export.email' => 'required|email',
            'export.message' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'export.email.required' => 'Email обязателен. На него отправим запрос',
            'export.message.required' => 'Телепаты в отпуске. Что вы хотите?',
        ];
    }
}
