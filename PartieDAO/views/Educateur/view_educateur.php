<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l' educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h1>Détails du Contact</h1>
    <a href="../../controllers/educateurControllers/HomeController.php">Retour à la liste des educateurs</a>
    <?php if ($educateur): ?>
        <ul>
            <li><strong>Numéro de Licence:</strong> <?php echo $educateur->getLicenceID()->getNumeroLicence(); ?></li>
            <li><strong>Nom:</strong> <?php echo $educateur->getLicenceID()->getNom(); ?></li>
            <li><strong>Prénom:</strong> <?php echo $educateur->getLicenceID()->getPrenom(); ?></li>
            <li><strong>Email:</strong> <?php echo $educateur->getEmail(); ?></li>
            <li><strong>statut admin?:</strong> <?php if( $educateur->getEstAdministrateur()==1){echo "oui";} else{echo "non";} ?></li>

            <li><strong>Contact:</strong> <?php echo $educateur->getLicenceID()->getcontactID()->getNom() . ' ' . $educateur->getLicenceID()->getcontactID()->getPrenom(); ?></li>
            <li><strong>Catégorie:</strong> <?php echo $educateur->getLicenceID()->getcategorieID()->getNom(); ?></li>
        </ul>
    <?php else: ?>
        <p>Aucun educateur trouvé.</p>
    <?php endif; ?>
</body>
</html>

