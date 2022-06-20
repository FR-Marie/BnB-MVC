<?php

//j'ai enlevé "use PDO" car ça m'affichait que ce n'était pas nécessaire de le faire

class Database
{
    private $host = "localhost";
    private $dbname = "le_marche_du_livre";
    private  $user = "root";
    private $pass = "";


    //Un booleen static est connecté = null = variable existante sans valeur (différent de undifined)
    //La variable s'appelle elle même sans instance via self::$isConnected
    private static $isConnected = null;


    public function getPDO(){
        //Si la connexion est nulle
        if(self::$isConnected === null){
            //On essaie de ce connecter
            try {
                //instance de PDO (+ paramètres du constructeur)
                self::$isConnected = new PDO("mysql:host=". $this->host .";dbname=".$this->dbname. ";charset=UTF8", $this->user, $this->pass);
                //setAttribute
                self::$isConnected->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Connexion réussie =>
                echo "<div class='center'><p class='lime darken-3 white-text'>Connexion à la BD via PDO MySQL réussie</p></div> ";

                //La variable static isConnected = l'instance de PDO et ses paramètres de connexion
                //Mais comme cette variable est static on l'appel sans instance:
                //self::$isConnected donc lors de l'appel multiple de getPDO
                //une seule instance de new PDO est appelée
                return self::$isConnected;

            }catch (\PDOException $exception){
                echo "Echec de la connexion à la base de données: " .$exception->getMessage();
                die();
            }
        }else{
            echo "erreur : instances multiples de PDO";
            return self::$isConnected;
        }
    }
}
