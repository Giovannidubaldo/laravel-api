<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'description' => 'required|max:150',
            'start_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve contenere minimo 5 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione deve contenere massimo 150 caratteri',
            'start_date.required' => 'La data di inizio progetto è obbligatoria',
            'end_date.required' => 'La data di fine progetto è obbligatoria'
        ];
    }
}
