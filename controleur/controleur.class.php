<?php
require_once("modele/modele.class.php");

class Controleur {
    private $unModele;

    public function __construct() {
        $this->unModele = new Modele();
    }

    // Méthode pour inscrire un utilisateur
    public function inscription($tab) {
        $this->unModele->inscription($tab);
    }

    // Méthode pour récupérer les inscriptions
    public function getInscriptions() {
        return $this->unModele->getInscriptions();
    }

    // Méthode pour la connexion de l'utilisateur
    public function connexion($email, $mdp) {
        return $this->unModele->connexion($email, $mdp);
    }

    // Méthode pour récupérer les utilisateurs
    public function getUsers() {
        return $this->unModele->getUsers();
    }
}
?>
