<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class SaveUserRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required_without:id|confirmed', // должен быть заполнен, если пустой ИД, т.е. новый юзер
            'current_password' => [
                'required',
                // проверка текущего пароля ;)
                function ($attribute, $value, $fail) {
                    if (! Hash::check($value, \Auth::user()->password)) {
                        $fail( __('labels.current_password_is_invalid') );
                    }
                },
            ],
            'is_admin' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id' => __('labels.user_id_empty'),
            'name' => __('labels.user_name'),
            'email' => __('labels.user_email'),
            'password' => __('labels.user_password'),
            'password_confirmation' => __('labels.user_password_confirmation'),
            'current_password' => __('labels.user_current_password'),
            'is_admin' => __('labels.user_is_admin_title'),
        ];
    }
}
