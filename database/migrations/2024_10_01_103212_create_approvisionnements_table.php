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
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('nom_du_deposant')->nullable();
            $table->string('objet');
            $table->enum('mode_approvisionnement', ['Espèces', 'Chèque', 'Virement', 'Carte de crédit']);
            $table->decimal('montant', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvisionnements');
    }
};
