<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Zahtev', function (Blueprint $table) {
            $table->increments('ID_Zahtev');
            $table->string('Vrsta_proizvoda', 20);
            $table->string('Opis', 200)->nullable();
            $table->date('Datum_kreiranja');
            $table->unsignedInteger('Klijent_id');
            $table->string('Lokacija', 255);
            $table->string('Telefon', 10);
        
            $table->foreign('Klijent_id')
                  ->references('ID_Klijent')->on('Klijent')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Zahtev');
    }
};
