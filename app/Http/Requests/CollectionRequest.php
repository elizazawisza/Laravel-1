<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
            'nazwa' =>'required',
            'rok'=>'required',
            'cena'=>'required' ,
            'pamiec'=>'required',
            'kolor'=>'required',
            'przekatna'=>'required|numeric',
        ];
    }

    public function messages(){
        return [
            'nazwa.required' => "Pole nazwa nie może być puste",
            'rok.required' => "Pole rok nie może być puste",
            'cena.required' => "Pole cena nie może zawierać liter",
            'pamiec.required' => "Pole pamiec nie może być puste",
            'kolor.required' => "Pole kolor nie może być puste",
            'przekatna.required' => "Pole przekatna nie może być puste",
            'przekatna.numeric' => 'Przekatna musi byc liczba',

        ];
    }
}
