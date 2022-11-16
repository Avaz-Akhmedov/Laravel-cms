<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => ["required",Rule::unique("users","email"),"email"],
            "password" => ["required","confirmed"]
        ];
    }
}
