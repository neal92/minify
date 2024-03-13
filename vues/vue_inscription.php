<?php
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vos traitements de validation et d'enregistrement des données

    // Redirection vers la page d'accueil
    header("Location: index.php?page=1");
    exit(); // Terminer le script après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Utilisateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Inscription Utilisateur</h3>
                        <form method="post" id="inscription-form">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" name="nom" id="nom" onblur="c_nom()">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" onblur="c_prenom()">
                            </div>
                            <div class="form-group">
                                <label for="age">Age :</label>
                                <input type="number" class="form-control" id="age" name="age" onblur="c_age()">
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="text" class="form-control" name="email" id="email" onblur="c_email()">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Téléphone :</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" onblur="c_telephone()">
                            </div>
                            <div class="form-group">
                                <label for="mdp_utilisateur">Mot de passe :</label>
                                <input type="password" class="form-control" name="mdp_utilisateur" id="mdp_utilisateur">
                            </div>
                            <!-- Affichage du message d'erreur -->
                            <div id="erreurEmail" style="color: red; display: none;"></div>
                            <div id="erreurPrenom" style="color: red; display: none;"></div>
                            <div id="erreurNom" style="color: red; display: none;"></div>
                            <div id="erreurAge" style="color: red; display: none;"></div>
                            <div id="erreurTelephone" style="color: red; display: none;"></div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="Valider">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

