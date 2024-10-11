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
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->unsignedBigInteger('categorie_id'); // Clé étrangère pour categorie_beneficiaires
            $table->string('denomination');
            $table->string('num_tel');
            $table->string('num_ifu');
            $table->string('adresse');
            $table->string('poste');
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('categorie_id')->references('id')->on('categorie_beneficiaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaires');
    }
};
