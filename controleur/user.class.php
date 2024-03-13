<?php
class User {
    private $iduser, $nom, $prenom, $age, $email, $telephone, $mdp_utilisateur, $date_inscription;

    public function __construct() {
        $this->iduser = 0;
        $this->nom = $this->prenom = $this->age = $this->email = $this->telephone = $this->mdp_utilisateur = "";
        $this->date_inscription = 0;
    }

    public function renseigner($tab) {
        $this->iduser = (isset($tab['iduser'])) ? $tab['iduser'] : 0;
        $this->nom = $tab['nom'];
        $this->prenom = $tab['prenom'];
        $this->age = $tab['age'];
        $this->email = $tab['email'];
        $this->telephone = $tab['telephone'];
        $this->mdp_utilisateur = $tab['mdp_utilisateur'];
        $this->date_inscription = (isset($tab['date_inscription'])) ? $tab['date_inscription'] : 0;
    }

    public function afficherHtml() {
        return "
        <br> nom : " . $this->nom . "
        <br> prénom : " . $this->prenom . "
        <br> âge : " . $this->age . "
        <br> email : " . $this->email . "
        <br> téléphone : " . $this->telephone . "
        <br> Date d'inscription : " . $this->date_inscription . "
        ";
    }

    public function serialiser() {
        return array(
            "iduser" => $this->iduser,
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "age" => $this->age,
            "email" => $this->email,
            "telephone" => $this->telephone,
            "mdp_utilisateur" => $this->mdp_utilisateur,
            "date_inscription" => $this->date_inscription,
        );
    }

    public function toJson() {
        $tab = $this->serialiser();
        return json_encode($tab);
    }

    // Getters and setters
    public function getIdUser() {
        return $this->iduser;
    }

    public function setIdUser($iduser) {
        $this->iduser = $iduser;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getMdpUtilisateur() {
        return $this->mdp_utilisateur;
    }

    public function setMdpUtilisateur($mdp_utilisateur) {
        $this->mdp_utilisateur = $mdp_utilisateur;
    }

    public function getDateInscription() {
        return $this->date_inscription;
    }

    public function setDateInscription($date_inscription) {
        $this->date_inscription = $date_inscription;
    }
}
?>
