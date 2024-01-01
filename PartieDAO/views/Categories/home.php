<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Categories</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h1>Liste des Categories</h1>
    <a href="../.././controllers/categorieControllers/AddCategorieController.php">Ajouter un categorie</a>

    <?php
    if (count($categories) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie): ?>
                    <tr>
                        <td><?php echo $categorie->getNom(); ?></td>
                        <td><?php echo $categorie->getCodeRaccourci(); ?></td>
                        <td>
                            <a href="../.././controllers/categorieControllers/ViewCategorieController.php?id=<?php echo $categorie->getId(); ?>">Voir</a>
                            <a href="../.././controllers/categorieControllers/EditCategorieController.php?id=<?php echo $categorie->getId(); ?>">Modifier</a>
                            <a href="../.././controllers/categorieControllers/DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune categorie trouvé.</p>
    <?php endif; ?>
</body>
</html>

