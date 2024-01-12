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
                Edit educateur          </a>

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

</body>
</html>
