<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Stolar;
use Illuminate\Support\Facades\Hash;   

class StolarSeeder extends Seeder {
  public function run() {
    Stolar::create(['Ime'=>'Milan','Prezime'=>'Stolar','Email'=>'milan@exam.local','Lozinka'=>Hash::make('secret'), 'Telefon'=>'060123456']);
  }
}
