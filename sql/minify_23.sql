-- Supprimer la base de données si elle existe
DROP DATABASE IF EXISTS minify_23;

-- Créer la base de données minify_23
CREATE DATABASE minify_23;

-- Utiliser la base de données minify_23
USE minify_23;

-- Créer la table utilisateurs
CREATE TABLE utilisateurs (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    age INT,
    email VARCHAR(255),
    telephone VARCHAR (15),
    mdp VARCHAR(255),
    date_inscription DATE
);

-- Créer la table curations
CREATE TABLE curations (
    id_curation INT AUTO_INCREMENT PRIMARY KEY,
    titre_cur VARCHAR(255),
    description_cur TEXT,
    id_utilisateur INT,
    date_creation DATE,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
);

-- Créer la table echanges
CREATE TABLE echanges (
    id_echange INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT,
    id_curation INT,
    type_echange VARCHAR(50),
    contenu_echange TEXT,
    date_echange DATE,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur),
    FOREIGN KEY (id_curation) REFERENCES curations(id_curation)
);

-- Créer la table commentaires
CREATE TABLE commentaires (
    id_commentaire INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT,
    id_curation INT,
    contenu_commentaire TEXT,
    date_commentaire DATE,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur),
    FOREIGN KEY (id_curation) REFERENCES curations(id_curation)
);

-- INSERTION DES UTILISATEURS

INSERT INTO utilisateurs (nom, prenom, age, email, mdp, date_inscription)
VALUES ('nomuser1', 'prenomuser1', 25, 'user1@example.com', '123', '2024-01-24');
