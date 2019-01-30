<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracownikRequest extends FormRequest
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
            'imie' =>'required',
            'nazwisko'=>'required',
            'email'=>'required|email' ,
            'numer_telefonu'=>'required|numeric|digits:9|regex:/[0-9]{9}/'
        ];
    }
    public function messages(){
        return [
            'imie.required' => "To pole nie może być puste",
            'nazwisko.required' => "To pole nie może być puste",
            'email.required' => "To pole nie moze być puste",
            'numer_telefonu.required' => "To pole nie może być puste",
            'email.email' => "Podaj poprawny adres email" ,
            'numer_telefonu.numeric' => 'Numer telefonu nie może zawierać liter',
            'numer_telefonu.digits' => 'Numer telefonu powinien mieć 9 znaków',
        ];
    }
}
