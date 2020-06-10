<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatient extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|max:255|min:3',
            'prenom' => 'required|max:255|min:3',
            'telephone' => 'required|max:13|min:8',
            'gendre' => 'required|in:male,female,homme,femme',
            'email'=>'required|email',
            'taille'=>'required|max:3',
            'taille'=>'required|max:3|min:2',
            'poids'=>'required|max:3|min:2',
            'adresse'=>'required',
            'etat_civil'=>'required',
            'profession' => 'required',
            'date_naissance'=>'required',
            'lieu_naissance'=>'required|string'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Ce champ est requis.',
            'email' => "S'il vous plaît entrez un email correct.",
            'min'=>"Le téléphone doit comporter au moins :min caractères."
        ];
    }
}
