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
        Schema::create('commande_temp', function (Blueprint $table) {
            $table->integer('idV');
            $table->text('numIm', 20);
            $table->text('modelV', 50);
            $table->string('moteur', 20);
            $table->string('couleur', 20);
            $table->decimal('prixV', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_temp');
    }
};
