<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
<h1>Ajouter un Educateur</h1>
<a href="../../controllers/educateurControllers/HomeController.php">Retour à la liste des educateurs</a>

<form action="../../controllers/educateurControllers/AddEducateurController.php" method="post">
    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email"><br>

    <label for="est_administrateur">Administrateur</label>
    <select name="est_administrateur" id="est_administrateur">
        <option value="non">Non</option>
        <option value="oui">Oui</option>
    </select>
    <br><br>
    <label for="licencie_id">Licencié :</label>
    <select name="licencie_id" id="licencie_id">
        <?php foreach ($licencies as $licencie): ?>
            <option value="<?php echo $licencie->getId(); ?>">
                <?php echo $licencie->getNumeroLicence(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" name="action" value="Ajouter">
</form>
</body>
</html>