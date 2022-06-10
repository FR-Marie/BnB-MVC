<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//Sans autoload.php (ici exemple d'appel de la classe Exception)
//require_once "../vendor/phpmailer/phpmailer/src/Exception.php";
require '../vendor/autoload.php';

require_once "../model/database.php";

class Utilisateurs extends database{

    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $mail_utilisateur;
    private $telephone_utilisateur;
    private $region_utilisateur;
    private $password_utilisateur;


    public function inscriptionUtilisateur(){


///////NOM///////
        if (isset($_POST["nom_utilisateur"]) && !empty($_POST["nom_utilisateur"])){
            $this->nom_utilisateur = trim(htmlspecialchars($_POST["nom_utilisateur"]));
            var_dump($_POST["nom_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ NOM</p>";
        }

///////PRENOM///////
        if (isset($_POST["prenom_utilisateur"]) && !empty($_POST["prenom_utilisateur"])){
            $this->prenom_utilisateur = trim(htmlspecialchars($_POST["prenom_utilisateur"]));
            var_dump($_POST["prenom_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ PRENOM</p>";
        }

///////MAIL///////
        if (isset($_POST["mail_utilisateur"]) && !empty($_POST["mail_utilisateur"])){
            $this->mail_utilisateur = trim(htmlspecialchars($_POST["mail_utilisateur"]));
            var_dump($_POST["mail_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ MAIL</p>";
        }

///////TELEPHONE///////
        if (isset($_POST["telephone_utilisateur"]) && !empty($_POST["telephone_utilisateur"])){
            $this->telephone_utilisateur = $_POST["telephone_utilisateur"];
            var_dump($_POST["telephone_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ TELEPHONE</p>";
        }

///////REGION///////
        if (isset($_POST["region_utilisateur"]) && !empty($_POST["region_utilisateur"])){
            $this->region_utilisateur = $_POST["region_utilisateur"];
            var_dump($_POST["region_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ REGION</p>";
        }

///////PASSWORD///////
        if (isset($_POST["password_utilisateur"]) && !empty($_POST["password_utilisateur"])){
            $this->password_utilisateur = trim(htmlspecialchars($_POST["password_utilisateur"]));
            var_dump($_POST["password_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ PASSWORD</p>";
        }

///////PASSWORD REPEAT///////
        if (isset($_POST["passwordRepeat_utilisateur"]) && !empty($_POST["passwordRepeat_utilisateur"])){
            $this->passwordRepeat_utilisateur = trim(htmlspecialchars($_POST["passwordRepeat_utilisateur"]));
            var_dump($_POST["passwordRepeat_utilisateur"]);
        }else{
            echo "<p class='red-text center'>Merci de remplir le champ PASSWORD REPEAT</p>";
        }





            $db = $this->getPDO();

            $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `telephone_utilisateur`, 
                            `region_utilisateur_id`) 
                            VALUES (?, ?, ?, ?, ?, ?)";

            $request = $db->prepare($sql);

            $request->bindParam(1, $clean_nom_utilisateur);
            $request->bindParam(2, $clean_prenom_utilisateur);
            $request->bindParam(3, $_POST["mail_utilisateur"]);
            $request->bindParam(4, $_POST["telephone_utilisateur"]);
            $request->bindParam(5, $_POST["region_utilisateur"]);


            $request->execute([
                $clean_nom_utilisateur = trim(htmlspecialchars("nom_utilisateur")),
                $clean_prenom_utilisateur = trim(htmlspecialchars("prenom_utilisateur")),
                $_POST["mail_utilisateur"],
                $_POST["telephone_utilisateur"],
                $_POST["region_utilisateur"]
            ]);


            if ($request){
                ?>
                <style>
                    #formInscriptionUtilisateur{
                        display: none;
                    }
                </style>
                <div class="center green red-text">
                    <p>Votre inscription est prise en compte. Merci de la valider en cliquant sur le lien qui se trouve dans l'email que vous
                        venez de recevoir</p>
                </div>
                <?php

            }else{
                ?>
                <style>
                    #formInscriptionUtilisateur{
                        display: none;
                    }
                </style>
                <div class="center red white-text">
                    <p>Erreur lors de votre inscription. Veuillez réessayer</p>
                    <p>Si le problème persiste, contactez notre équipe.</p>
                </div>
                <?php
            }

        }






}
