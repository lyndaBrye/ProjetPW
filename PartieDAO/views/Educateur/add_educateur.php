<!DOCTYPE html>
<html lang="fr">  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<head>
    <meta charset="UTF-8">
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                Ajouter un educateur            </a>

        </div>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav navbar-nav navbar-right"  href="../../views/home.php"> Accueil</a></li>
            </ul>
            <div
            <!-- Collect the nav links, forms, and other content for toggling -->
        </div><!-- /.container-fluid -->
</nav>
<div class="span3">

<form action="../../controllers/educateurControllers/AddEducateurController.php" method="post">
    <label for="mot_de_passe">Mot de passe :</label>
    <input class="span3" type="password" id="mot_de_passe" name="mot_de_passe" required><br>

    <label for="email">Email :</label>
    <input class="span3" type="email" id="email" name="email"><br>

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
</div>
</body>
</html>