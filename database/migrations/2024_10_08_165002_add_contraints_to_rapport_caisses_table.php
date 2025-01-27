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
        Schema::table('rapport_caisses', function (Blueprint $table) {
            $table->integer('montant_base')->nullable()->change();
            $table->integer('montant_veiile')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rapport_caisses', function (Blueprint $table) {
            $table->integer('montant_veiile')->nullable(false)->change();
        });
    }
};
