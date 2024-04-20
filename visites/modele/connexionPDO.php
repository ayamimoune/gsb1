<?php
class connexionPDO
{
    private $conn;

    public function __construct()
    {
        $login = "root";
        $mdp = "";
        $bd = "projet_gsb";
        $serveur = "localhost";

        try {
            $this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur de connexion PDO ";
            die();
        }
    }

    public function getConn()
    {
        return $this->conn;
    }
}
?>