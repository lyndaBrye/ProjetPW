<!DOCTYPE html>
<html lang="fr">  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<head>
    <meta charset="UTF-8">

    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                Club sportif           </a>

        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav navbar-nav navbar-right"  href="../../views/home.php" > Accueil</a></li>
            </ul>
            <div
            <!-- Collect the nav links, forms, and other content for toggling -->
        </div><!-- /.container-fluid -->
</nav>
<body>
<div class="span3">

    <?php if ($contact): ?>
        <form action="../../controllers/contactControllers/EditContactController.php?id=<?php echo $contact->getId(); ?>" method="post">
            <label for="nom">Nom :</label>
            <input class="span3" type="text" id="nom" name="nom" value="<?php echo $contact->getNom(); ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input class="span3" type="text" id="prenom" name="prenom" value="<?php echo $contact->getPrenom(); ?>" required><br>

            <label for="email">Email :</label>
            <input class="span3" type="email" id="email" name="email" value="<?php echo $contact->getEmail(); ?>"><br>

            <label for="telephone">Téléphone :</label>
            <input class="span3" type="text" id="numero_tel" name="numero_tel" value="<?php echo $contact->getTelephone(); ?>"><br>

            <input type="submit" value="Modifier">
        </form>
</div>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

