<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h1>Détails du Contact</h1>
    <a href="../../views/home.php">Accueil</a>

    <?php if ($categories): ?>
        <p><strong>Nom :</strong> <?php echo $categories->getNom(); ?></p>
        <p><strong>Code :</strong> <?php echo $categories->getCodeRaccourci(); ?></p>

    <?php else: ?>
        <p>La categorie n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>

