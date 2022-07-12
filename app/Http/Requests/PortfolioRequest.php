<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'name'=>'required|string',
            'photo'=>'nullable|file|mimes:jpg,jpeg,png,webp',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_id'=>'array',
            'tag_id.*'=>'integer'

        ];
    }
}
