<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieBeneficiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tableau des catégories à insérer
        $categories = [
            ['nom' => 'Catégorie1'],
            ['nom' => 'Catégorie2'],
            ['nom' => 'Catégorie3'],
            // Ajoutez d'autres catégories si nécessaire
        ];

        // Insérer les catégories dans la base de données
        DB::table('categorie_beneficiaires')->insert($categories);
    }
}
