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
        Schema::create('billetages', function (Blueprint $table) {
            $table->id();
            $table->integer('billet_10000')->default(0); // Nombre de billets de 10.000 FCFA
            $table->integer('billet_5000')->default(0);  // Nombre de billets de 5.000 FCFA
            $table->integer('billet_2000')->default(0);  // Nombre de billets de 2.000 FCFA
            $table->integer('billet_1000')->default(0);  // Nombre de billets de 1.000 FCFA
            $table->integer('billet_500')->default(0);   // Nombre de billets de 500 FCFA
            $table->integer('piece_500')->default(0);    // Nombre de pièces de 500 FCFA
            $table->integer('piece_200')->default(0);    // Nombre de pièces de 200 FCFA
            $table->integer('piece_100')->default(0);    // Nombre de pièces de 100 FCFA
            $table->integer('montant_total')->default(0); // Montant total
            $table->integer('a_solde_physique')->default(0); // Montant total
            $table->integer('b_solde_theorique')->default(0); // Montant total
            $table->integer('c_ecart')->default(0); // Montant total
            $table->date('date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billetages');
    }
};
