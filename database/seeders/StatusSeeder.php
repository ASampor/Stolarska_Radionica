<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder {
  public function run() {
    foreach(['Novo','U izradi','Završeno','Isporuceno'] as $s) {
      Status::firstOrCreate(['Naziv'=>$s]);
    }
  }
}

