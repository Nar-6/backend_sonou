<?php

namespace App\Traits;

trait NumberToWords
{
    public function nombreEnLettres($nombre) {
        $nombresLettres = [
            0 => 'zero', 1 => 'un', 2 => 'deux', 3 => 'trois', 4 => 'quatre',
            5 => 'cinq', 6 => 'six', 7 => 'sept', 8 => 'huit', 9 => 'neuf',
            10 => 'dix', 11 => 'onze', 12 => 'douze', 13 => 'treize',
            14 => 'quatorze', 15 => 'quinze', 16 => 'seize', 17 => 'dix-sept',
            18 => 'dix-huit', 19 => 'dix-neuf', 20 => 'vingt', 30 => 'trente',
            40 => 'quarante', 50 => 'cinquante', 60 => 'soixante', 70 => 'soixante-dix',
            80 => 'quatre-vingts', 90 => 'quatre-vingt-dix'
        ];
    
        if (array_key_exists($nombre, $nombresLettres)) {
            return $nombresLettres[$nombre];
        } elseif ($nombre < 100) {
            $dixaines = floor($nombre / 10) * 10;
            $unités = $nombre % 10;
    
            return trim($nombresLettres[$dixaines] . ($unités ? '-' . $nombresLettres[$unités] : ''));
        } elseif ($nombre < 1000) {
            $centaines = floor($nombre / 100);
            $restant = $nombre % 100;
    
            return trim(($centaines > 1 ? $nombresLettres[$centaines] . ' cents' : 'cent') . ($restant ? ' ' . $this->nombreEnLettres($restant) : ''));
        } elseif ($nombre < 1000000) {
            $milliers = floor($nombre / 1000);
            $restant = $nombre % 1000;
    
            return trim($this->nombreEnLettres($milliers) . ' mille' . ($restant ? ' ' . $this->nombreEnLettres($restant) : ''));
        } elseif ($nombre < 1000000000) { // Gestion des millions
            $millions = floor($nombre / 1000000);
            $restant = $nombre % 1000000;
    
            return trim($this->nombreEnLettres($millions) . ' million' . ($millions > 1 ? 's' : '') . ($restant ? ' ' . $this->nombreEnLettres($restant) : ''));
        } elseif ($nombre == 1000000000) { // Cas spécial pour un milliard
            return 'un milliard';
        } elseif ($nombre < 10000000000) { // Gestion des milliards
            $milliards = floor($nombre / 1000000000);
            $restant = $nombre % 1000000000;
    
            return trim($this->nombreEnLettres($milliards) . ' milliard' . ($milliards > 1 ? 's' : '') . ($restant ? ' ' . $this->nombreEnLettres($restant) : ''));
        } else {
            return 'Nombre trop grand';
        }
    }
}

