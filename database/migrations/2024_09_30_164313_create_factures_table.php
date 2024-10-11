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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->string('num_facture');
            $table->decimal('montant', 10, 2);
            $table->decimal('montant_tva', 10, 2)->nullable();
            $table->decimal('montant_aib', 10, 2)->nullable();
            $table->date('date_facture');
            $table->string('operation');
            $table->decimal('montant_ttc', 10, 2);
            $table->string('retenue')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('categorie_id')->references('id')->on('categorie_factures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
