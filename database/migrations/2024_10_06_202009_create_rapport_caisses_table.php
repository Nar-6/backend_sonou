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
        Schema::create('rapport_caisses', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant_base', 15, 2);
            $table->decimal('montant_veiile', 15, 2);
            $table->date('date');
            $table->string('site');
            $table->unsignedBigInteger('caissier_id')->nullable();
            $table->foreign('caissier_id')->references('id')->on('users')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapport_caisses');
    }
};
