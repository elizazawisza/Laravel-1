<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kolekcja extends Model
{
    protected $table = 'kolekcja';
    protected $fillable = ['nazwa', 'rok', 'cena', 'pamiec', 'kolor', 'przkatna', 'zdjecie'];

}
