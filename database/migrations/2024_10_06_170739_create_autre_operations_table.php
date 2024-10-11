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
        Schema::create('autre_operations', function (Blueprint $table) {
            $table->id();
            $table->enum('categorie', ['débit', 'crédit']);
            $table->unsignedBigInteger('beneficiaire_id');
            $table->decimal('montant', 15, 2); // Par exemple pour FCFA
            $table->string('motif_operation');
            $table->string('executant');
            $table->string('beneficiaire_depense');
            $table->enum('ci_pp',['ci', 'pp']);
            $table->string('numero_identite');
            $table->date('exp_le');
            $table->timestamps(); // Champs created_at et updated_at

            $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autre_operations');
    }
};
