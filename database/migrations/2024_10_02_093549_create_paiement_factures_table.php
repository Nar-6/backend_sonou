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
        Schema::create('paiement_factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('beneficiaire_id');
            $table->string('numero_facture');
            $table->text('motif_facture');
            $table->decimal('montant', 10, 2);
            $table->date('date_facture');
            $table->decimal('montant_imposable', 10, 2)->nullable();
            $table->string('nature_retenue')->nullable();
            $table->decimal('taux_aib', 5, 2)->nullable();
            $table->decimal('montant_aib', 10, 2)->nullable();
            $table->decimal('net_a_payer', 10, 2);
            $table->decimal('montant_a_payer', 10, 2);
            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categorie_factures')->onDelete('cascade');
            $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement_factures');
    }
};
