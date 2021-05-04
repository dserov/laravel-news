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
            'news.title' => 'required|min:10',
            'news.content' => '',
            'news.source' => 'active_url',
            'news.spoiler' => 'required|min:10',
            'news.category_id' => 'required|exists:categories,id',
            'news.is_private' => '',
        ];
    }

    public function attributes()
    {
        return [
            'news.title' => __('labels.news_title'),
            'news.spoiler' => __('labels.news_spoiler'),
            'news.category_id' => __('labels.news_category_name'),
            'news.source' => __('labels.news_source'),
        ];
    }
}
