<?php


require_once "../model/database.php";

//Création de la fonction qui contient les éléments de la Splash Page.
//Cette fonction sera ensuite appelée par le controleur (controller) pour l'afficher
class Annonces extends database{

    public function afficherLesAnnonces(){

        $db = $this->getPDO();

        $sql = "SELECT * FROM livres
                INNER JOIN genres ON livres.genre_livre_id = genres.id_genre
                INNER JOIN regions ON livres.region_livre_id = regions.id_region
                INNER JOIN auteurs ON livres.auteur_livre_id = auteurs.id_auteur
                INNER JOIN utilisateurs ON livres.vendeur_livre_id = utilisateurs.id_utilisateur";

        $annonces = $db->query($sql);


        return $annonces;
    }
}
