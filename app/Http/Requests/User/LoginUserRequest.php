<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequestApi;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends BaseFormRequestApi
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|min:5|max:50|email',
            'password' => 'required|min:5|max:50'
        ];
    }
}
