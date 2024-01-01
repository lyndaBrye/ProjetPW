<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Licenciés</title>
</head>
<body>

<h1>Liste des Licenciés</h1>
<a href="../../controllers/licencieControllers/AddLicencieController.php">Ajouter un licencié</a>

<table>
    <thead>
    <tr>
        <th>Numéro de Licence</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Catégorie (Code Raccourci)</th>
        <th>Contact (Nom)</th>
        <th>Contact (Email)</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($licencie as $licence) : ?>
        <tr>
            <td><?php echo $licence->getNumeroLicence(); ?></td>
            <td><?php echo $licence->getNom(); ?></td>
            <td><?php echo $licence->getPrenom(); ?></td>
            <td><?php echo $licence->getcategorieID()->getCodeRaccourci();?></td>
            <td><?php echo $licence->getcontactID()->getNom(); ?></td>
            <td><?php echo $licence->getcontactID()->getEmail(); ?></td>
            <td>
                <a href="../../controllers/licencieControllers/DeleteLicencieController.php?id=<?php echo $licence->getId(); ?>">Supprimer</a>
                <a href="../../controllers/licencieControllers/EditLicencieController.php?id=<?php echo $licence->getId(); ?>">Modifier</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>