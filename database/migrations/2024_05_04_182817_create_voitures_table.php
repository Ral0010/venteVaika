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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id('idV');
            $table->text('numIm', 20);
            $table->text('modelV', 50);
            $table->string('moteur', 20);
            $table->string('couleur', 20);
            $table->decimal('prixV', 15, 2);
            $table->string('etat', 20)->default('Disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
