<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Klijent;
use App\Models\Stolar;
use App\Models\Status;

class KreiranjeNarudzbineTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_moze_da_kreira_narudzbinu()
    {
        $this->seed();
        $client = Klijent::first();
        $stolar = Stolar::first();
        $status = Status::first();

        $resp = $this->post(route('narudzbine.store'), [
            'Specifikacija'=>'Plakar po meri',
            'Rok'=>now()->addWeeks(2)->toDateString(),
            'Klijent_id'=>$client->ID_Klijent,
            'Stolar_id'=>$stolar->ID_Stolar,
            'Cena'=>500.00,
            'Status_id'=>$status->ID_Status
        ]);

        $resp->assertRedirect();
        $this->assertDatabaseHas('Narudzbina', ['Klijent_id'=>$client->ID_Klijent]);
    }
}
