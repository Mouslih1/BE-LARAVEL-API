<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequestApi;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends BaseFormRequestApi
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
            'name' => 'required|min:3|max:30',
            'email' => 'required|min:5|max:50|email|unique:users,email',
            'password' => 'required|min:6|max:50|confirmed'
        ];
    }
}
