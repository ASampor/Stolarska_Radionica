<?php

namespace Database\Factories;

use App\Models\Termin;
use App\Models\Zahtev;
use App\Models\Stolar;
use App\Models\Administrator;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminFactory extends Factory
{
    protected $model = Termin::class;

    public function definition()
    {
        return [
            'Datum_vreme' => $this->faker->dateTimeBetween('now', '+1 week'),
            'Zahtev_id' => Zahtev::factory(),
            'Stolar_id' => Stolar::factory(),
        ];
    }
}
