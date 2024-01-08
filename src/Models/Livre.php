<?php

namespace App\Models;

use App\Abstract\ItemBibliotheque;
use App\Traits\Loggable;

class Livre extends ItemBibliotheque {
    use Loggable;

    protected string $titre;
    protected string $auteur;
    protected int $nbPages;

    //fonctionnalités de base qu'on retrouvera partout
    public function __construct($titre, $auteur, $nbPages) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
    }
        public function getDetails(): string {
        return "Livre - Titre: {$this->titre}, Auteur: {$this->auteur}, Nb de pages: {$this->nbPages}";
    }

        public function getTitre(): string {
            return $this->titre;
        }
        public function setTitre(string $newTitre): void {
            if (empty($newTitre)) {
                throw new LivreException("Le titre du livre ne peut pas être vide");
            }
            $this->titre = $newTitre;
            $this->logInfo("Le titre : '{$this->titre}' a été ajouté avec succès");
        }

        public function getAuteur(): string {
            return $this->auteur;
        }
        public function setAuteur(string $newAuteur): void {
            if (empty($newAuteur)) {
                throw new LivreException("Le nom de l\'auteur ne peut être vide");
            }
            $this->auteur = $newAuteur;
            $this->logInfo("Le nom de l\'auteur : '{$this->auteur}' a été ajouté avec succès");
        }

        public function getNbPages(): int {
            return $this->nbPages;
        }
        public function setNbPages(int $newNbPages): void {
            if (empty($newNbPages)) {
                throw new LivreException("Le nombre de page ne peut être vide");
            }
            $this->nbPages = $newNbPages;
            $this->logInfo("Le nb de page : '{$this->nbPages}' a été ajouté avec succès");
        }
}

//$livre = new Livre("Salut", "camus", 500);
//echo $livre->getDetails() . PHP_EOL;