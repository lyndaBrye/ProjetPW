<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du licencie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h1>Détails du licencie</h1>
    <a href="../../views/home.php">Accueil</a>

    <?php if ($licencie): ?>
        <ul>
            <li><strong>Numéro de Licence:</strong> <?php echo $licencie->getNumeroLicence(); ?></li>
            <li><strong>Nom:</strong> <?php echo $licencie->getNom(); ?></li>
            <li><strong>Prénom:</strong> <?php echo $licencie->getPrenom(); ?></li>
            <li><strong>Email:</strong> <?php echo $licencie->getEmail(); ?></li>
            <li><strong>Contact:</strong> <?php echo $licencie->getcontactID()->getNom() . ' ' . $licencie->getContact()->getPrenom(); ?></li>
            <li><strong>Catégorie:</strong> <?php echo $licencie->getcategorieID()->getNom(); ?></li>
        </ul>
    <?php else: ?>
        <p>Aucun licencié trouvé.</p>
    <?php endif; ?>
</body>
</html>

