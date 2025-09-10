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
        Schema::create('Narudzbina', function (Blueprint $table) {
            $table->increments('ID_Narudzbina');
            $table->string('Specifikacija', 255);
            $table->date('Rok');
            $table->unsignedInteger('Klijent_id');
            $table->unsignedInteger('Stolar_id');
            $table->decimal('Cena', 10, 2);
            $table->unsignedInteger('Status_id');
        
            $table->foreign('Klijent_id')
                  ->references('ID_Klijent')->on('Klijent')
                  ->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('Stolar_id')
                  ->references('ID_Stolar')->on('Stolar')
                  ->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('Status_id')
                  ->references('ID_Status')->on('Status')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Narudzbina');
    }
};
