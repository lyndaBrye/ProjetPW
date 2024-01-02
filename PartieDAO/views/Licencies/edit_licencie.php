<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un licencie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<h1>Modifier un licencie</h1>
<a href="../../controllers/licencieControllers/HomeController.php">Retour à la liste des licencies</a>

<?php if ($licencie): ?>
    <form action="../../controllers/licencieControllers/EditLicencieController.php?id=<?= $licencie->getId(); ?>" method="post">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= $licencie->getNom(); ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $licencie->getPrenom(); ?>" required><br>


        <label for="contact_id">Contact :</label>
        <select name="contact_id" id="contact_id" >
            <?php
            // Assurez-vous que $contacts est une liste d'objets Contact

            foreach ($contacts as $contact) {
                $selected = ($contact->getId() == $licencie->getcontactId()->getId()) ? "selected" : "";
                echo "<option value='{$contact->getId()}' $selected>{$contact->getNom()} {$contact->getPrenom()}</option>";
            }
            ?>
        </select>
        <label for="categorie_id">Categorie :</label>

        <select name="categorie_id" id="categorie_id">
            <?php
            // Assurez-vous que $contacts est une liste d'objets Contact

            foreach ($categories as $categorie) {
                $selected = ($categorie->getId() == $licencie->getcategorieId()->getId()) ? "selected" : "";
                echo "<option value='{$categorie->getId()}' $selected>{$categorie->getCodeRaccourci()} </option>";
            }
            ?>
        </select>


        <input type="submit" value="Modifier">
    </form>
<?php else: ?>
    <p>Le licencie n'a pas été trouvée.</p>
<?php endif; ?>

</body>
</html>
