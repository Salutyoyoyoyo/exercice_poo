<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Models/Livre.php'; 
require __DIR__ . '/../src/Managers/BibliothequeManager.php'; 

use App\Helpers\UIHelper;
use App\Models\livre;
use App\Managers\BibliothequeManager;

$bibliothequeManager = new BibliothequeManager();

do {
    UIHelper::afficherMenu();

    // Lire l'option de l'utilisateur depuis le terminal
    $choix = readline("Choisissez une option : ");

    // Exécuter la logique en fonction de l'option choisie
    switch ($choix) {
        case 1:
                $titre = readline("Entrez le titre du livre : ");
                $auteur = readline("Entrez l'auteur du livre : ");
                $nbPages = readline("Entrez le nombre de pages du livre : ");

                $livre = new Livre($titre, $auteur, $nbPages);

                $bibliothequeManager->addLivre($livre);
            break;
        case 2:
                $livres = $bibliothequeManager->getLivres();

                if (empty($livres)) {
                    echo "Aucun livre disponible.\n";
                } else {
                    echo "Liste des livres :\n";
                    foreach ($livres as $livre) {
                        echo "Titre : {$livre->getTitre()}, Auteur : {$livre->getAuteur()}, Pages : {$livre->getNbPages()}\n";
                    }
                }
            break;
        case 3:

                $titreRecherche = readline("Entrez le titre du livre à rechercher : ");

                $livreTrouve = $bibliothequeManager->getLivreByTitre($titreRecherche);

                if ($livreTrouve) {
                    echo "Livre trouvé :\n";
                    echo "Titre : {$livreTrouve->getTitre()}, Auteur : {$livreTrouve->getAuteur()}, Pages : {$livreTrouve->getNbPages()}\n";
                }
            break;
        case 4:
                $domaineRecherche = readline("Entrez le domaine du livre à rechercher : ");

                $livreTrouve = $bibliothequeManager->getLivreByDomaine($domaineRecherche);

                if ($livreTrouve) {
                    echo "Livre trouvé :\n";
                    echo "Domaine : {$livreTrouve->getDomaine()}, Auteur : {$livreTrouve->getAuteur()}, Pages : {$livreTrouve->getNbPages()}\n";
                }
            break;
        case 5:
            echo "Au revoir !\n";
            exit;
        default:
            echo "Option non valide. Veuillez choisir une option valide.\n";
    }
} while (true);