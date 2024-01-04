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
                editer une categorie           </a>

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

<?php if ($categorie): ?>

    <form action="../../controllers/categorieControllers/EditCategorieController.php?id=<?= $categorie->getId(); ?>" method="post">
        <label for="nom">Nom :</label>
        <input class="span3" type="text" id="nom" name="nom" value="<?= $categorie->getNom(); ?>" required><br>

        <label for="code_raccourci">Code Raccourci :</label>
        <input class="span3" type="text" id="code_raccourci" name="code_raccourci" value="<?= $categorie->getCodeRaccourci(); ?>" required><br>

        <input  type="submit" value="Modifier">
    </form>
<?php else: ?>
    <p>La catégorie n'a pas été trouvée.</p>
<?php endif; ?>
</div>
</body>
</html>
