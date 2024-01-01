<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Ajouter un Licencié</h1>

<form action="../../controllers/licencieControllers/AddLicencieController.php" method="post">
    <label for="numero_licence">Numéro de Licence:</label>
    <input type="text" id="numero_licence" name="numero_licence" required><br>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <!-- Autres champs à ajouter selon vos besoins -->


    <label for="categorie_id">Catégorie :</label>
    <select name="categorie_id" id="categorie_id">
        <?php foreach ($categories as $categorie): ?>
            <option value="<?php echo $categorie->getId(); ?>">
                <?php echo $categorie->getNom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="contact_id">Nom et prenoms du contact  :</label>
    <select name="contact_id" id="contact_id">
        <?php foreach ($contacts as $contact): ?>
            <option value="<?php echo $contact->getId(); ?>">
                <?php echo $contact->getNom().' '.$contact->getPrenom(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" name="action" value="Ajouter">
</form>

<a href="../../controllers/licencieControllers/HomeController.php">Retour à la liste des licenciés</a>
</body>
</html>
