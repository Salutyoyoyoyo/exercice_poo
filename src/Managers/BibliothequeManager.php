<?php

namespace App\Managers;

use App\Models\Livre;
use App\Models\LivreSpecialise;
use App\Traits\Loggable;
use App\Interfaces\Recherchable;

class BibliothequeManager implements Recherchable {
    use Loggable;

    private const ERROR_FILE_NOT_FOUND = 'Fichier non trouve ';
    private const ERROR_INTERNAL_SERVER = 'Erreur lors de l\'exécution de la requête :';

    private array $livres;

    public function __construct() {
        $this->livres = [];
    }

    public function getLivres(): array {
        return $this->livres;
    }

    public function addLivre(Livre $livre): void {
        $this->livres[] = $livre;
        $this->logInfo("Le livre a été ajouté avec succès");
    }

    public function getLivreById(int $id): ?Livre {
        try {
            foreach ($this->livres as $livre) {
                if ($id === $livre->getId()) {
                    return $livre;
            }
        }
            echo self::ERROR_FILE_NOT_FOUND . " avec l'ID {$id}.\n";
            return null;
        } catch (Exception $e) {
            echo self::ERROR_INTERNAL_SERVER . '' . $e->getMessage() . "\n";
        }
    }

    public function getLivreByTitre(string $titre): ?Livre {
        try{
            foreach ($this->livres as $livre) {
                if ($titre === $livre->getTitre()) {
                    return $livre;
                }
            }
            echo self::ERROR_FILE_NOT_FOUND . " avec le titre {$titre}.\n";
            return null;
        } catch (Exception $e) {
            echo self::ERROR_INTERNAL_SERVER . '' . $e->getMessage() . "\n";
        }
    }


    public function getLivreByAuteur(string $auteur): ?Livre {
        try {
            foreach ($this->livres as $livre) {
                if ($titre === $livre->getAuteur()) {
                    return $livre;
                }
            }
            echo self::ERROR_FILE_NOT_FOUND . " avec le nom de l'auteur : {$auteur}.\n";
            return null;
        } catch (Exception $e) {
            echo self::ERROR_INTERNAL_SERVER . '' . $e->getMessage() . "\n";
        }
}
    public function getLivreByDomaine(string $domaine): ?LivreSpecialise {
        try {
            foreach ($this->livres as $livre) {
                if ($titre === $livre->getDomaine()) {
                    return $livre;
                }
            }
            echo self::ERROR_FILE_NOT_FOUND . " avec le nom de domaine : {$domaine}.\n";
            return null;
        } catch (Exception $e) {
            echo self::ERROR_INTERNAL_SERVER . '' . $e->getMessage() . "\n";
        }
}
    public function supprLivre(Livre $livre): void {
        try {
            $index = array_search($livre, $this->livres, true);
            if($index !== false){
                array_splice($this->livres, $index, 1);
                $this->logInfo("Le livre a été supprimé avec succès");
            }
        } catch (Exception $e) {
            echo self::ERROR_INTERNAL_SERVER . '' . $e->getMessage() . "\n";
        }
    }

    public function supprAllLivres(): void {
        try {
            $this->livres = [];
            $this->logInfo("Les livres ont été supprimé avec succès");
        } catch (Exception $e) {
            echo self::ERROR_INTERNAL_SERVER . '' . $e->getMessage() . "\n";
        }
    }

}