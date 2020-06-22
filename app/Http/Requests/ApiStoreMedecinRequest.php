<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiStoreMedecinRequest extends FormRequest
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
            'medecin.nom' => 'required',
            'medecin.prenom' => 'required',
            'medecin.email' => 'required|unique:users,email',
            'medecin.statut' => 'required',
            'medecin.wilaya_id' => 'required',
            'medecin.specialite' => 'required'
        ];
    }

    public function messages() {
        return [
            'medecin.nom.required' => 'Le nom est requis.',
            'medecin.prenom.required' => 'Le prénom est requis.',
            'medecin.email.required' => 'L\'adresse email est requise.',
            'medecin.email.unique' => 'L\'adresse email est déjà utilisée.',
            'medecin.statut.required' => 'Le statut du médecin est requis.',
            'medecin.wilaya_id.required' => 'La wilaya est requise.',
            'medecin.specialite.required' => 'La spécialité est requise'
        ];
    }
}
