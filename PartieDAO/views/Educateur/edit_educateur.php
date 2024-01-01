<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Modifier un educateur</h1>

<?php if ($educateur): ?>
<form action="../../controllers/educateurControllers/EditEducateurController.php?id=<?= $educateur->getIdEducateur(); ?>" method="post">

    <label for="email">email :</label>
    <input type="email" id="email" name="email" value="<?= $educateur->getEmail(); ?>" required><br>
    <label for="est_administrateur">Administrateur</label>
    <select name="est_administrateur" id="est_administrateur">
        <option value="non" <?php if($educateur->getEstAdministrateur() == 0) echo 'selected'; ?>>Non</option>
        <option value="oui" <?php if($educateur->getEstAdministrateur() == 1) echo 'selected'; ?>>Oui</option>
    </select>
    <br><br>
    <input type="submit" value="Modifier">
    </form><?php else: ?>
    <p>Aucun licencié trouvé.</p>
<?php endif; ?>

<a href="../../controllers/educateurControllers/HomeController.php">Retour à la liste des educateurs</a>
</body>
</html>
