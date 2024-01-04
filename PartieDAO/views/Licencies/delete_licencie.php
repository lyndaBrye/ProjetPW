<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Supprimer un licencie</h1>

<?php if ($licencie): ?>
    <p>Voulez-vous vraiment supprimer le licencie "<?php echo $licencie->getNom(); ?> " ?</p>
    <form action="../../controllers/licencieControllers/DeleteLicencieController.php?id=<?php echo $licencie->getId(); ?>" method="post">
        <input type="submit" value="Oui, Supprimer">
    </form>
    <a href="../../views/home.php">Non , retour a l'accueil</a>

<?php else: ?>
    <p>Le contact n'a pas été trouvé.</p>
<?php endif; ?>

</body>
</html>

