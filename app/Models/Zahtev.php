<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zahtev extends Model
{
    protected $table = 'Zahtev';
    protected $primaryKey = 'ID_Zahtev';
    public $timestamps = false;

    protected $fillable = ['Vrsta_proizvoda', 'Opis', 'Datum_kreiranja', 'Klijent_id', 'Lokacija', 'Telefon'];

    // Relacije
    public function klijent()
    {
        return $this->belongsTo(Klijent::class, 'Klijent_id', 'ID_Klijent');
    }

    public function termin()
    {
        return $this->hasOne(Termin::class, 'Zahtev_id', 'ID_Zahtev');
    }
}
