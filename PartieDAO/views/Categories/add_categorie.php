<!DOCTYPE html>
<html lang="fr">  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                Ajouter une categorie            </a>

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

    <form action="../.././controllers/categorieControllers/AddCategorieController.php" method="post">
        <label for="nom">Nom :</label>
        <input class="span3" type="text" id="nom" name="nom" required><br>

            <label for="code_raccourci">code :</label>
        <input type="text" class="span3" id="code_raccourci" name="code_raccourci" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>
    </div>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>

