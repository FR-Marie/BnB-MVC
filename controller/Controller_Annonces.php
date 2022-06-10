<?php

require_once "../model/Model_Annonces.php";

function afficherToutesLesAnnonces(){

    $annoncesClasse = new Annonces();

    $toutesLesAnnonces = $annoncesClasse->afficherLesAnnonces();

    require_once "../view/accueil.php";

    return $toutesLesAnnonces;
}