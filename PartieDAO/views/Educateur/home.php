<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Educateurs</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h1>Liste des educateurs</h1>
    <a href="../.././controllers/educateurControllers/AddEducateurController.php">Ajouter un educateur</a>
    <?php
    if (count($educateurs) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Numero licencie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($educateurs as $educateur): ?>
                    <tr>
                        <td><?php echo $educateur->getLicenceID()->getNumeroLicence(); ?></td>

                        <td>
                            <a href="../.././controllers/educateurControllers/ViewEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>">Voir</a>
                            <a href="../.././controllers/educateurControllers/EditEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>">Modifier</a>
                            <a href="../.././controllers/educateurControllers/DeleteEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun educateur  trouvé.</p>
    <?php endif; ?>
</body>
</html>

