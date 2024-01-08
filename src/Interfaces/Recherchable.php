<?php

namespace App\Interfaces;

use App\Models\Livre;
use App\Models\LivreSpecialise;

interface Recherchable {
    public function getLivreByTitre(string $titre): ?Livre;
    public function getLivreByAuteur(string $auteur): ?Livre;
    public function getLivreByDomaine(string $domaine): ?LivreSpecialise;
}
