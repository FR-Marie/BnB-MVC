<?php
require_once "../model/Model_Utilisateurs.php";
require_once "../model/Model_mailInscription.php";


function afficherFormulaireInscriptionUtilisateur()
{
    //Appel fichier de la vue
    require_once "../view/inscriptions.php";


    if (isset($_POST["btn-inscription"])){

        //echo "btn ok";
        //var_dump("nimp");

        $UtilisateurClasse = new Utilisateurs();
        $UtilisateurClasse->inscriptionUtilisateur();

    }

}


function connexionUtilisateurController(){

    //Appel du fichier vue
    require_once "../view/connexions.php";


    if (isset($_POST["btn-connexion"])){

        //echo "btn ok";
        //var_dump("test du btn connexion");

            $UtilisateurClasse = new Utilisateurs();
            $Utilisateur = $UtilisateurClasse->connexionUtilisateur();
            return $Utilisateur;



    }
}
