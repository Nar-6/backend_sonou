<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieFactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Tableau des catégories à insérer
         $categories = [
            ['nom' => 'FAC1'],
            ['nom' => 'FAC2'],
            ['nom' => 'FAC3'],
            // Ajoutez d'autres catégories si nécessaire
        ];

        // Insérer les catégories dans la base de données
        DB::table('categorie_factures')->insert($categories);
    }
}
