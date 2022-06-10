<?php

require_once "../model/database.php";

//Création de la fonction qui contient les régions pour les afficher dans un formulaire.
//Cette fonction sera ensuite appelée par le controleur (controller) pour l'afficher
class Regions extends database{

    public function afficherLesRegions(){
        $db = $this->getPDO();
        $sql = "SELECT * FROM regions";
        $regions = $db->query($sql);
        return $regions;
    }
}
