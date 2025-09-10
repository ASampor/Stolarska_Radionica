<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Zahtev;
use App\Models\Termin;
use App\Models\Narudzbina;
use App\Models\Status;
use App\Models\Klijent;
use App\Models\Stolar;

class DemoSeeder extends Seeder {
  public function run() {
    $k = Klijent::first();
    $s = Stolar::first();
    $zahtev = Zahtev::create([
      'Vrsta_proizvoda'=>'Sto',
      'Opis'=>'Drveni sto po meri',
      'Datum_kreiranja'=>now()->toDateString(),
      'Klijent_id'=>$k->ID_Klijent,
      'Lokacija'=>'Beograd',
      'Telefon'=>'061111111'
    ]);
    Termin::create([
      'Datum_vreme'=>now()->addDays(3),
      'Zahtev_id'=>$zahtev->ID_Zahtev,
      'Stolar_id'=>$s->ID_Stolar
    ]);
    $status = Status::first();
    Narudzbina::create([
      'Specifikacija'=>'Sto 120x80',
      'Rok'=>now()->addWeeks(2)->toDateString(),
      'Klijent_id'=>$k->ID_Klijent,
      'Stolar_id'=>$s->ID_Stolar,
      'Cena'=>300.00,
      'Status_id'=>$status->ID_Status
    ]);
  }
}
