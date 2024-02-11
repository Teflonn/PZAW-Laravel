<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
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
            
                'title' => ['required', 'string', 'min:3','max:50'],
                'content' => ['required', 'string', 'min:10','max:500'],
                'author_id' => ['required', 'numeric', 'exists:users,id'],
            
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Pole tytułu jest wymagane.',
            'title.string' => 'Pole tytułu musi być tekstem.',
            'title.min' => 'Pole tytułu musi mieć co najmniej :min znaków.',
            'title.max' => 'Pole tytułu nie może mieć więcej niż :max znaków.',
            'content.required' => 'Pole treści jest wymagane.',
            'content.string' => 'Pole treści musi być tekstem.',
            'content.min' => 'Pole treści musi mieć co najmniej :min znaków.',
            'content.max' => 'Pole treści nie może mieć więcej niż :max znaków.',
            'author_id.required' => 'Pole ID autora jest wymagane.',
            'author_id.exists' => 'Podane ID autora nie istnieje w bazie danych.',
        ];
    }

}
