<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => [Password::min(6)->numbers()->mixedCase()],
        ];

        
    }
 public function messages()
    {
        return [
            'password.confirmed' => 'The password confirmation does not match.',
            'name.required' => 'Pole nazwy jest wymagane.',
            'name.string' => 'Pole nazwy musi być tekstem.',
            'name.min' => 'Pole nazwy musi mieć co najmniej :min znaków.',
            'name.max' => 'Pole nazwy nie może mieć więcej niż :max znaków.',
            'email.required' => 'Adres email jest wymagany.',
            'email.email' => 'Wpisz poprawny adres email',
            'email.max' => 'Adres email nie może mieć więcej niż :max znaków.',
            'password.required' => 'Podaj hasło.',
            'password.confirmed' => 'Podane hasło musi się zgadzać.',
        ];
    
        
    }

   
}
