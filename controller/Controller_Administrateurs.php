<?php

require_once "../model/Model_Administrateurs.php";



function connexionAdministrateurController(){

    //Appel du fichier vue
    require_once "../view/connexions.php";

    $role_administrateur = $_POST["select_connexion_administrateur"];

    if (isset($_POST["btn-connexion"])){

        //echo "btn ok";
        //var_dump("test du btn connexion");


        if ($role_administrateur === true){
            $administrateurClasse = new Administrateur();
            $administrateurClasse->connexionAdministrateur();
        }else{
            echo "Vous devez être un utilisateur inscris pour vous connecter avec le rôle utilisateur";
        }



    }
}
