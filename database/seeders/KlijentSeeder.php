<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Klijent;
use Illuminate\Support\Facades\Hash;   

class KlijentSeeder extends Seeder {
  public function run() {
    Klijent::create(['Ime'=>'Ana','Prezime'=>'Anić','Email'=>'ana@exam.local','Lozinka'=>Hash::make('secret')]);
    Klijent::create(['Ime'=>'Marko','Prezime'=>'Markić','Email'=>'marko@exam.local','Lozinka'=>Hash::make('secret')]);
  }
}
