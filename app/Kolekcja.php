<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kolekcja extends Model
{
    protected $table = 'kolekcja';
    protected $fillable = ['nazwa', 'rok', 'cena', 'pamiec', 'kolor', 'przkatna', 'zdjecie'];
    protected $appends=['pamiec_gb', 'cena_zl'];

    public function getPamiecGbAttribute(){
        return $this->pamiec.' GB';
    }

    public function getCenaZlAttribute(){

        return number_format($this->cena,2,","," ").' zł';
    }

    public function pracownik()
    {
        return $this->belongsToMany('App\Pracownik');
    }

}
