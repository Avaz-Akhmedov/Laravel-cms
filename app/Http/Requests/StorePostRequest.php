<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "content" => "required|between:30,1000",
            "image" => "required|mimes:jpeg,png|image|max:2000",
            "category_id" => "required|exists:categories,id",
            "tags" => "required|array",
            "tags.*" => "required|string|max:100"

        ];
    }
}
