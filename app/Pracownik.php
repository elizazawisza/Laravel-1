<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pracownik extends Model
{
    protected $table = 'pracownicy';
    protected $fillable = ['imie', 'nazwisko', 'email', 'numer_telefonu'];

    public function kolekcja(){
        return $this->belongsToMany('App\Kolekcja');
    }
}
