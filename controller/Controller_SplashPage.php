<?php

//Appel du contenu de la Splash Page dans "model"
require_once "../model/Model_SplashPage.php";

//Le routeur appelle la fonction:

function afficherSplashPage(){

    //on crée l'instance de la classe "SplashPage" et on la stocke dans une variable
    $SplashPageClasse = new SplashPage();

    //on stocke la méthode "public function donneesSplashPage()" dans une variable
    $SplashPage = $SplashPageClasse->donneesSplashPage();

    //Appel du fichier view (vue) pour l'affichage utilisateur
    require_once "../view/splashPage.php";

    return $SplashPage;
}