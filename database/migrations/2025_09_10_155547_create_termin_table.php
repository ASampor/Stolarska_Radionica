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
        Schema::create('Termin', function (Blueprint $table) {
            $table->increments('ID_Termin');
            $table->dateTime('Datum_vreme');
            $table->unsignedInteger('Zahtev_id');
            $table->unsignedInteger('Stolar_id');
        
            $table->foreign('Zahtev_id')
                  ->references('ID_Zahtev')->on('Zahtev')
                  ->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('Stolar_id')
                  ->references('ID_Stolar')->on('Stolar')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Termin');
    }
};
