<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une Catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Modifier une Catégorie</h1>
<a href="../../controllers/categorieControllers/HomeController.php">Retour à la liste des catégories</a>

<?php if ($categorie): ?>
    <form action="../../controllers/categorieControllers/EditCategorieController.php?id=<?= $categorie->getId(); ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= $categorie->getNom(); ?>" required><br>

        <label for="code_raccourci">Code Raccourci :</label>
        <input type="text" id="code_raccourci" name="code_raccourci" value="<?= $categorie->getCodeRaccourci(); ?>" required><br>

        <input type="submit" value="Modifier">
    </form>
<?php else: ?>
    <p>La catégorie n'a pas été trouvée.</p>
<?php endif; ?>

</body>
</html>
