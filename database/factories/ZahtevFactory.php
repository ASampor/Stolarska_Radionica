<?php

namespace Database\Factories;

use App\Models\Zahtev;
use App\Models\Klijent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZahtevFactory extends Factory
{
    protected $model = Zahtev::class;

    public function definition()
    {
        return [
            'Vrsta_proizvoda' => $this->faker->word(),
            'Opis' => $this->faker->sentence(6),
            'Datum_kreiranja' => now(),
            'Klijent_id' => Klijent::factory(), // pravi klijenta zajedno
            'Lokacija' => $this->faker->address(),
            'Telefon' => $this->faker->numerify('06########'),
        ];
    }
}
