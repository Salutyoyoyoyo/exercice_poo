<?php

namespace App\Models;

class LivreSpecialise extends Livre {
    protected string $domaine;

    public function __construct($titre, $auteur, $nbPages, $domaine) {
        parent::__construct($titre, $auteur, $nbPages);
        $this->domaine = $domaine;
    }

    public function getDetails(): string {
        return "Livre spécialisé - Titre: {$this->titre}, Auteur: {$this->auteur}, Nb de pages: {$this->nbPages}, Nom de domaine: {$this->domaine}";
    }
    public function getDomaine():string {
        return $this->domaine;
    }
    public function setDomaine(string $newDomaine): void {
        if(empty($newDomaine)){
            throw new LivreException("Le nom de domaine ne peut être vide");
        }
        $this->domaine = $newDomaine;
    }
}