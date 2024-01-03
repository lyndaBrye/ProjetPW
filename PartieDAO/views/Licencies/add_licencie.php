<!DOCTYPE html>
<html lang="fr">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<head>
    <meta charset="UTF-8">
    <title>Ajouter un Licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Ajouter un Licencié</h1>

<form action="../../controllers/licencieControllers/AddLicencieController.php" method="post">
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

<a href="../licencieControllers/HomeController.php">Retour à la liste des licenciés</a>
</body>
</html>
