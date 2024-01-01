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
<a href="../../controllers/categorieControllers/HomeController.php">Retour à la liste des contacts</a>

<?php if ($licencie): ?>
    <p>Voulez-vous vraiment supprimer le contact "<?php echo $licencie->getNom(); ?> " ?</p>
    <form action="../../controllers/licencieControllers/DeleteLicencieController.php?id=<?php echo $licencie->getId(); ?>" method="post">
        <input type="submit" value="Oui, Supprimer">
    </form>
<?php else: ?>
    <p>Le contact n'a pas été trouvé.</p>
<?php endif; ?>

</body>
</html>

