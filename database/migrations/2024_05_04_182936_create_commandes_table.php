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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('idComm');
            $table->integer('idCli');
            $table->text('cinCli', 50);
            $table->text('nomCli', 50);
            $table->integer('idV');
            $table->text('modelV', 50);
            $table->text('numIm', 20);
            $table->decimal('prixV', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
