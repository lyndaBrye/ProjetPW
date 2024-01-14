
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Deconnexion</h1>

                <p class="card-text">Voulez-vous vraiment vous deconnecter ?</p>
                <form action="../../controllers/educateurControllers/AuthentificationController.php"  method="post">
                    <input type="hidden" name="action" value="logout">

                    <button type="submit" class="btn btn-danger">Oui</button>
                </form>
                <a href="../../views/home.php" class="btn btn-secondary">Non, retour à l'accueil</a>

        </div>
    </div>
</div>

<!-- Ajoutez ici vos scripts Bootstrap ou d'autres bibliothèques JavaScript si nécessaire -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
