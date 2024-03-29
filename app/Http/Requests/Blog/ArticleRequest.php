<?php

namespace App\Http\Requests\Blog;

use App\Models\Blog\BlogCategory;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'categories' => ['required'],
            'excerpt' => ['required', 'max:255'],
            'body' => ['required'],
            'is_published' => ['boolean'],
        ];
    }
}
