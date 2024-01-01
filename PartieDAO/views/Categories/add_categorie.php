<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un Contact</h1>
    <a href="../../controllers/categorieControllers/HomeController.php">Retour à la liste des categories</a>

    <form action="../.././controllers/categorieControllers/AddCategorieController.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

            <label for="code_raccourci">code :</label>
        <input type="text" id="code_raccourci" name="code_raccourci" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>

