<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post_content' => 'required|max:255|string',
            'links' => 'required|json',
            'region' => 'sometimes|required|string',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
