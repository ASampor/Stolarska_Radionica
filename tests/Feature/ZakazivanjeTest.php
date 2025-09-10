<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Klijent;
use App\Models\Stolar;
use App\Models\Zahtev;

class ZakazivanjeTest extends TestCase
{
    use RefreshDatabase;

    public function test_klijent_moze_da_zakazi_termin()
    {
        $this->seed(); // seeduje potreban demo
        $client = Klijent::first();
        $stolar = Stolar::first();

        $resp = $this->post(route('termini.store'), [
            'Datum_vreme'=>now()->addDays(2)->toDateTimeString(),
            'Zahtev_id'=>Zahtev::factory()->create(['Klijent_id'=>$client->ID_Klijent])->ID_Zahtev,
            'Stolar_id'=>$stolar->ID_Stolar
        ]);

        $resp->assertRedirect();
        $this->assertDatabaseHas('Termin', ['Stolar_id'=>$stolar->ID_Stolar]);
    }
}
