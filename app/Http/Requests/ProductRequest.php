<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // 'gallery' => 'required|image|mimes:jpeg,png,jpg|max:2048|array|min:1',
            'categories' => 'required|array|min:1',
            'description' => 'required|min:100',
        ];
    }
}
