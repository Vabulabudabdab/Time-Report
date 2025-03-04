<?php

namespace App\Http\Requests;

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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => "Данное поле обязательно для заполнения",
          'email.required' => "Данное поле обязательно для заполнения",
          'email.unique' => "Данная эл.почта занята",
          'password.required' => "Данное поле обязательно для заполнения",
          'password.confirmed' => "Пароли не совпадают",
          'password_confirmation.required' => "Подтвердите пароль",
        ];
    }

}
