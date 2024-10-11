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
        Schema::create('annulations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('beneficiaire_id');
            $table->string('numero_facture');
            $table->text('motif_facture');
            $table->decimal('montant', 10, 2);
            $table->date('date_facture');
            $table->enum('type', ['correction', 'regularisation']);
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
        Schema::dropIfExists('annulations');
    }
};
