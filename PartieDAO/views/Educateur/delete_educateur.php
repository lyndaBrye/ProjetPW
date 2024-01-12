<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Supprimer un licencie</h1>
<a href="../../views/home.php">Accueil</a>

<?php if ($educateur): ?>
    <p>Voulez-vous vraiment supprimer l educateur  "<?php echo $educateur->getIdEducateur(); ?> " ?</p>
    <form action="../../controllers/educateurControllers/DeleteEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" method="post">
        <input type="submit" value="Oui, Supprimer">
    </form>
<?php else: ?>
    <p>L educateur n'a pas été trouvé.</p>
<?php endif; ?>

</body>
</html>

