<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Supprimer un contact</h1>

            <?php if ($contact): ?>
                <p class="card-text">Voulez-vous vraiment supprimer le contact "<?php echo $contact->getNom(); ?>" ?</p>
                <form  action="../../controllers/contactControllers/DeleteContactController.php?id=<?php echo $contact->getId();  ?>" method="post">
                    <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                </form>
                <a href="../../views/home.php" class="btn btn-secondary">Non, retour à l'accueil</a>
            <?php else: ?>
                <p class="card-text">contact n'a pas été trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Ajoutez ici vos scripts Bootstrap ou d'autres bibliothèques JavaScript si nécessaire -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
