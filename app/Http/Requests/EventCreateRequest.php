<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:80',
            'description' => 'required',
            'lieu' => 'required',
            'date_start' => 'required',
            'date_end' => 'required|after:date_start'
        ];
    }

    public function messages() {
        return [
            'date_start.required' => 'La date et l\'heure de début sont obligatoires .',
            'date_end.required' => 'La date et l\'heure de fin sont obligatoires .',
            'description.required' => 'La description de l\'évènement est obligatoire .',
            'date_end.after' => 'La date de fin doit être ultérieure à la date de début'
        ];
    }
}
