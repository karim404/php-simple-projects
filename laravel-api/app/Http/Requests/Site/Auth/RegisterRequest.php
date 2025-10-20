<?php

namespace App\Http\Requests\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|string',
            'password_confirmation' => 'required|string|same:password',
            
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب يا زعيم',
            'name.min' => 'الاسم لازم يكون اكبر من 3 حروف ',
            'email.required' => 'الإيميل مطلوب يا زعيم',
            'email.email' => 'دخل إيميل صحيح من فضلك',
        ];
    }

}
