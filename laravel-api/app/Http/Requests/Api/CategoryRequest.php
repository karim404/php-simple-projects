<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
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
            'title' => 'required|string|max:50|min:3' ,
            'description' => 'nullable|string' ,
        ];
    }

    

    // to handle json validation error from formRequest :

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors!',
            'errors'  => $validator->errors()
        ], 422));
    }

    // او بروح احط في ال headers key:except => value: application/json 
    // فيرجع ال json errors()
}
