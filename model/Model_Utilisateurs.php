<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//Sans autoload.php (ici exemple d'appel de la classe Exception)
//require_once "../vendor/phpmailer/phpmailer/src/Exception.php";
require "../vendor/autoload.php";

require_once "../model/database.php";
require_once "../model/Model_mailInscription.php";

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


///////// EGALITE DES 2 MOTS DE PASSE POUR LANCER LA REQUETE/////////
        if ($_POST["password_utilisateur"] === ($_POST["passwordRepeat_utilisateur"])){

            $db = $this->getPDO();

            $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`, `telephone_utilisateur`, 
                            `region_utilisateur_id`) 
                            VALUES (?, ?, ?, ?, ?, ?)";

            $request = $db->prepare($sql);



            $request->bindParam(1, $this->nom_utilisateur);
            $request->bindParam(2, $this->prenom_utilisateur);
            $request->bindParam(3, $_POST["mail_utilisateur"]);
            $request->bindParam(4, $_POST["password_utilisateur"]);
            $request->bindParam(5, $_POST["telephone_utilisateur"]);
            $request->bindParam(6, $_POST["region_utilisateur"]);


            $request->execute([
                $this->nom_utilisateur,
                $this->prenom_utilisateur,
                $_POST["mail_utilisateur"],
                $_POST["password_utilisateur"],
                $_POST["telephone_utilisateur"],
                $_POST["region_utilisateur"]
            ]);


            if ($request){
                $mailReservationClasse = new MailInscription();
                $mailReservationClasse->mailInscriptionUtilisateurModel();
            }else{
                ?>
                <div>
                    <p class="center red-text">Une erreur est survenue. Veuillez réessayer.</p>
                </div>
                <?php
            }

            ////CONDITION EGALITE DES MOTS DE PASSE
        }else{
            ?>
            <div>
                <p class="center red-text">Attention! les mots de passe ne correspondent pas.</p>
            </div>
            <?php
        }



        ///accolade de la fonction inscription///
        }




/////////////////////////CONNEXION UTILISATEUR//////////////////////////
    public function connexionUtilisateur(){

        $db = $this->getPDO();


            $this->mail_connexion_utilisateur = trim(htmlspecialchars($_POST["mail_connexion_utilisateur"]));
            $this->password_connexion_utilisateur = trim(htmlspecialchars($_POST["password_connexion_utilisateur"]));


            $sql = "SELECT * FROM utilisateurs WHERE mail_utilisateur = ? AND mdp_utilisateur = ?";

            $requestConnexionUtilisateur = $db->prepare($sql);

            $requestConnexionUtilisateur->bindParam(1, $this->mail_connexion_utilisateur);
            $requestConnexionUtilisateur->bindParam(2, $this->password_connexion_utilisateur);

            $requestConnexionUtilisateur->execute($sql);



            if ($requestConnexionUtilisateur->rowCount() >= 1) {

                $table = $requestConnexionUtilisateur->fetch(PDO::FETCH_ASSOC);

                if ($this->mail_connexion_utilisateur === $table["mail_utilisateur"] && $this->pass_connexion_utilisateur === $table["mdp_utilisateur"]) {

                    session_start();

                    $_SESSION["utilisateur_connecte"] = true;
                    $_SESSION["utilisateur_connecte"] = $table["prenom_utilisateur"];

                    header("Location: dashboard-utilisateur");
                }else{
                    ?>
                    <div>
                        <p class="center red-text">Identifiants incorrects - Aucun utilisateur ne possède ces identifiants.</p>
                    </div>
                    <?php
                }
                    }else{
                        ?>
                        <div>
                            <p id='' class="center red-text">Identifiants incorrects.</p>
                        </div>
                        <?php
            }

}


////accolade de la classe Utilisateur////
}
