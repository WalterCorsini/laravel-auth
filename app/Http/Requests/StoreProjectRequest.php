<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:10'],
            'description'=> ['min:20'],
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Il campo titolo è vuoto',
            'title.min' => 'Titolo: devi inserire un minimo di 10 caratteri',
            'description.min' => 'Descrizione: devi inserire un minimo di 20 caratteri',
        ];

    }
}
