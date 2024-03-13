<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Minify</title>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?page=1">Minify</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php
            // Vérifier si l'utilisateur est connecté
            if(isset($_COOKIE['user'])) {
                // Utilisateur connecté, afficher le lien "Accueil"
                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=1">Accueil</a></li>';
                // Ajouter un lien de déconnexion
                echo '<li class="nav-item"><form method="post"><button type="submit" class="btn btn-link nav-link" name="deconnexion">Déconnexion</button></form></li>';
            }
            else {
                // Utilisateur non connecté, afficher les liens "Connexion" et "Inscription"
                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=2">Se Connecter</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=3">Inscription</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <center>
        <h1>Minify</h1>
        <?php
        // Inclure les fichiers de classe en premier
        require_once("controleur/user.class.php"); 
        require_once("controleur/controleur.class.php");

        // Instancier la classe Controleur
        $unControleur = new Controleur();

        // Traitement du formulaire d'inscription
        if(isset($_POST['Valider'])){
            $user = new User();
            $user->renseigner($_POST);
            $userJson = $user->toJson();
            setcookie("user",$userJson, time()+3600);
            $unControleur->inscription($user->serialiser());
        }

        // Traitement de la déconnexion
        if(isset($_POST['deconnexion'])) {
            // Supprimer le cookie de l'utilisateur
            setcookie("user", "", time() - 3600);
            // Recharger la page pour afficher les liens de connexion
            header("Location: index.php");
            exit; // Terminer l'exécution du script après la redirection
        }

        // Déterminer la page à charger
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

        // Charger la vue appropriée en fonction de la page
        switch($page){
            case 1: {
                // Afficher le contenu de la page d'accueil
                require_once("index.php");
            } break;
            case 2: {
                // Afficher la page de connexion
                require_once("vues/vue_connexion.php");
            } break;
            case 3: {
                // Afficher la page d'inscription
                require_once("vues/vue_inscription.php");
            } break;
        }
        ?>
    </center>
</div>

</body>
</html>
