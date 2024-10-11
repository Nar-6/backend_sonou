<?php

namespace App\Console\Commands;

use App\Models\Billetage;
use App\Models\RapportCaisse;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateBilletageDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-billetage-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         // Créer un nouvel enregistrement
         RapportCaisse::create([
            'montant_base' => 0.00, // Mettre la valeur par défaut ou calculée
            'montant_veiile' => 0.00, // Mettre la valeur par défaut ou calculée
            'date' => Carbon::today(), // Utilise la date du jour
            'site' => 'Nom du site', // Remplace par le nom du site approprié
            'caissier_id' => null, // Remplacer par l'ID du caissier si nécessaire
        ]);

        // Afficher un message de succès
        $this->info('Enregistrement billetage créé avec succès.');
    }
}
