<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseFormRequestApi;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends BaseFormRequestApi
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
        $id = $this->request()->segment(3);
        // dd($id);
        return [
            'title' => 'required|min:2|max:50|unique:products,title,'.$id.',id',
            'description' => 'required|min:3|max:1000',
            'size' => 'nullable|numeric|min:0',
            'color' => 'required|in:red,green',
            'price' => 'nullable|numeric|min:1'
        ];
    }
}
