<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Supprimer une categorie</h1>
<a href="../../controllers/categorieControllers/HomeController.php">Retour à la liste des contacts</a>

<?php if ($categories): ?>
    <p>Voulez-vous vraiment supprimer le contact "<?php echo $categories->getNom(); ?> <?php echo $categories->getCodeRaccourci(); ?>" ?</p>
    <form action="../../controllers/categorieControllers/DeleteCategorieController.php?id=<?php echo $categories->getId(); ?>" method="post">
        <input type="submit" value="Oui, Supprimer">
    </form>
<?php else: ?>
    <p>Le contact n'a pas été trouvé.</p>
<?php endif; ?>

</body>
</html>

