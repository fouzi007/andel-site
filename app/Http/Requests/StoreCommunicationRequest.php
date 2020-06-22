<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommunicationRequest extends FormRequest
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
            'file' => 'required|mimes:pdf'
        ];
    }

    public function messages() {
        return [
            'file.mimes' => 'Le fichier doit être au format PDF .',
            'file.required' => 'Veuillez sélectionner un fichier .'
        ];
    }
}
