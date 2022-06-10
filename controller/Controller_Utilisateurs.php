<?php
require_once "../model/Model_Utilisateurs.php";


function afficherFormulaireInscriptionUtilisateur()
{
    //Appel fichier de la vue
    require_once "../view/inscriptions.php";

}


function InscriptionUtilisateurController(){

    //fichier de la vue
    require_once "../view/inscriptions.php";


    if (isset($_POST["btn-inscription"])){


        //Ici les expressions requliere
        //Check des email et mot de passe avec preg_match php et les regexs
        //DOCS = https://www.w3schools.com/php/php_form_url_email.asp
        if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/', $_POST["mail_utilisateur"])) {
            echo "<div class='container'>
                <p class='alert alert-warning text-success'>Votre email est valide!</p>
                </div>";
        }

        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST["password_utilisateur"])) {
            echo "<div class='container'>
                <p class='alert alert-warning text-success'>Votre mot de passe est valide!</p>
                </div>";
        }


        //verifié le mot de passe et le mot passe repeter
        if($_POST["password_utilisateur"] === $_POST["passwordRepeat_utilisateur"]){
            //Ici la classe qui envoi des emails
            $mailInscription = new \model\EmailInscriptionUtilisateurs();
            $mail = $mailInscription->mailInscriptionUtilisateurs();
            return $mail;
        }else{
            ?>
            <p class="red orange-text">Les mots de passe ne correspondent pas</p>
            <a href="inscriptions" class="btn deep-orange">Retour</a>
            <?php
        }



    }

}
