<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pracownik extends Model
{
    protected $table = 'pracownicy';
    protected $fillable = ['imie', 'nazwisko', 'email', 'numer_telefonu', 'telefon_id'];

    public function kolekcja(){
        return $this->belongsTo('App\Kolekcja', 'telefon_id','id');
    }
}
