<?php
class Modele {
    private $unPdo;

    public function __construct() {
        try {
            $url = "mysql:host=localhost;dbname=minify_23";
            $user = "root";
            $mdp = "root";
            $this->unPdo = new PDO($url, $user, $mdp);
        } catch (PDOException $exp) {
            echo "<br> Erreur de connexion à la BDD : " . $exp->getMessage();
        }
    }

    public function getUsers() {
        $requete = "SELECT * FROM Utilisateurs";
        $select = $this->unPdo->prepare($requete);
        $select->execute();
        return $select->fetchAll();
    }


    public function connexion($email, $mdp) {
        $requete = "SELECT * FROM   utilisateurs WHERE email = :email AND mdp_utilisateur = :mdp";
        $donnees = array(
            ":email" => $email,
            ":mdp" => $mdp
        );
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
        return $select->fetch();
    }

    public function inscription($tab) {
        $dateInscription = date("Y-m-d H:i:s"); // Obtient la date actuelle au format "Y-m-d H:i:s"
    
        $requete = "INSERT INTO utilisateurs (nom, prenom, age, email, telephone, mdp_utilisateur, date_inscription) VALUES (:nom, :prenom, :age, :email, :telephone, :mdp_utilisateur, :dateInscription)";
    
        $donnees = array(
            ":nom" => $tab["nom"],
            ":prenom" => $tab["prenom"],
            ":age" => $tab["age"],
            ":email" => $tab["email"],
            ":telephone" => $tab["telephone"],
            ":mdp_utilisateur" => $tab["mdp_utilisateur"],
            ":dateInscription" => $dateInscription // Utilise la date actuelle
        );
    
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
    }

    public function getInscriptions() {
        $requete = "SELECT * FROM utilisateurs";
        $select = $this->unPdo->prepare($requete); 
        $select->execute();
        return $select->fetch();
    }
}
