<?php

namespace App\Http\Requests\Post;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|string|unique:posts|max:255',
            'content' => 'bail|required|string',
            'image' => 'bail|required|string|max:255',
            'likes' => '',
            'category_id' => '',
            'tags' => '',
        ];
    }
}
