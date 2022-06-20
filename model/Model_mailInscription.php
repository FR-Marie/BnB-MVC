<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require_once "../model/Model_Utilisateurs.php";




class MailInscription extends Utilisateurs {

    public function mailInscriptionUtilisateurModel(){

        $phpmailer = new PHPMailer();

        try{

            $lienConfirmationInscription = "http://localhost/le-marche-du-livre/confirmationInscriptionUtilisateur";


                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;         //Utilisation du service mail transfer protocole
                $phpmailer->isSMTP();                            //Utilisation du service mail transfer protocole
                $phpmailer->Host = 'smtp.mailtrap.io';          //Appel du host mailtrap
                $phpmailer->SMTPAuth = true;                    //Autorise et impose un user name + password
                $phpmailer->Port = 2525;                        //Port pour mailtrap (2525) sinon ->587 ou 465 pour `PHPMailer::ENCRYPTION_SMTPS` et gmail
                $phpmailer->Username = 'afd0f0767b5509';        //Generer lors de la création du compte mailTrap = dans l'espace mailtrap roue crantée + smtp setting -> phpmailer
                $phpmailer->Password = '364bcfa8f3811d';        // Idem pour le mot de passe

                //Pas obligatoire =>
                $phpmailer->setLanguage('fr', '../vendor/phpmailer/phpmailer/language/');
                $phpmailer->CharSet = 'UTF-8';


                //Recipients
                $phpmailer->setFrom('from@example.com', 'Mailer');
                $phpmailer->addAddress('joe@example.net', 'Joe User');     //Add a recipient
                $phpmailer->addAddress('ellen@example.com');               //Name is optional
                $phpmailer->addReplyTo('info@example.com', 'Information');
                $phpmailer->addCC('cc@example.com');
                $phpmailer->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $phpmailer->isHTML(true);                                  //Set email format to HTML
                $phpmailer->Subject = 'test du sujet';
                $phpmailer->Body    =
                    '
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="Content-Type" content="text/html">
                        <title>Votre inscription sur Le Marché du Livre</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    </head>
                    <body>
                        <div>
                            <p style="font-size: 18px">Bonjour,</p>
                            <p> Vous venez de vous inscrire sur le site Le Marché du Livre. Nous vous en remercions
                            et vous invitons à cliquer sur le lien de validation ci-après afin dep rofiter dès à présent de toutes
                            les fonctionalités du site! </p>

                            <a href="'.$lienConfirmationInscription.'">Confirmer</a>
                            
                            <p>Cordialement,</p>
                            <p>Martine MARTIN, Directrice Le Marché du Livre</p>


                        </div>
                    </body>
                    </html>
                    ';


                $phpmailer->body = "MIME-Version: 1.0";
                $phpmailer->body = "Content-type: text/html;charset=utf8";


                $phpmailer->AltBody = 'Copie si ca marche pas';

                $phpmailer->send();

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


                }catch (Exception $e) {
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
