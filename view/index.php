<?php

//demarrage de session
session_start();

//ob_start() => demarre la mémoire tampon
//(pas de donnée envoyée au navigateur car temporairement mise en tampon)
ob_start();


//TOUJOURS APPELER TOUS LES CONTROLEURS CREES!!!!!!!!!!!!!!!
require_once "../controller/Controller_SplashPage.php";
require_once "../controller/Controller_Annonces.php";
require_once "../controller/Controller_Regions.php";
require_once "../controller/Controller_Utilisateurs.php";


//Si un paramètre $_GET existe dans l'url:
if (isset($_GET["url"])){
//$url récupère ce paramètre
    $url = $_GET["url"];
}else{
    $url = "accueil";
}



/////// Si $url = splashPage ///////
if($url === "splashPage"){
    $title = "Bienvenue - Le Marché du livre";
    //appel de la fonction du controleur:
    afficherSplashPage();

/////// Sinon si $url = accueil ///////
}elseif ($url === "accueil"){
    $title = "Accueil - Le Marché du livre";
    //appel de la fonction du controleur:
    afficherToutesLesAnnonces();


}elseif ($url === "inscriptions"){
$title = "Inscription utilisateur - Le Marché du livre";
    //appel de la fonction du controleur:
    afficherFormulaireInscriptionUtilisateur();
    InscriptionUtilisateurController();
}


//Si $url renvoi une chaîne de caractère vide OU si $url contient un caractère interdit => redirection page d'accueil
if (($url === "") || ($url !=  '#:[\w]+)#')){
    $url = "accueil";
}



/*
 * ob_get_clean — Lit le contenu courant du tampon de sortie puis l'efface
 */
//ici $content se situe dans le dossier template.php
$content = ob_get_clean();
require_once "template.php";


