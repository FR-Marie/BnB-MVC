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
require_once "../controller/Controller_Administrateurs.php";


//Si un paramètre $_GET existe dans l'url:
if (isset($_GET["url"])){
//$url récupère ce paramètre
    $url = $_GET["url"];
}else{
    $url = "splashPage";
}





/////// Si $url = splashPage ///////
if($url === "splashPage"){
    $title = "Bienvenue - Le Marché du livre";
    //appel de la fonction du contrôleur:
    afficherSplashPage();

/////// Sinon si $url = accueil ///////
}elseif ($url === "accueil"){
    $title = "Accueil - Le Marché du livre";
    //appel de la fonction du contrôleur:
    afficherToutesLesAnnonces();


}elseif ($url === "inscriptions"){
$title = "Inscription utilisateur - Le Marché du livre";
    //appel de la fonction du contrôleur:
    afficherFormulaireInscriptionUtilisateur();
    //InscriptionUtilisateurController();

}elseif ($url === "confirmationInscriptionUtilisateur") {
    $title = "Confirmation Inscription utilisateur - Le Marché du livre";
    //appel de la fonction du contrôleur:
    require_once "../view/confirmationInscriptionUtilisateur.php";

}elseif ($url === "connexions") {
    $title = "Connexion utilisateur - Le Marché du livre";
    //appel de la fonction du contrôleur:
    connexionUtilisateurController();
    //connexionAdministrateurController();
    //require_once "../view/connexions.php";

}elseif ($url === "dashboard-utilisateur" && $_SESSION["utilisateur_connecte"] === true) {
    $title = "Dashboard utilisateur";
    require_once "dashboard-utilisateur.php";


//Si $url renvoi une chaîne de caractère vide OU si $url contient un caractère interdit => redirection page d'accueil
}elseif ($url != '#:[\w]+)#') {
        header('location: splashPage');


}

/*
 * ob_get_clean — Lit le contenu courant du tampon de sortie puis l'efface
 */
//ici $content se situe dans le dossier template.php
$content = ob_get_clean();
require_once "template.php";


