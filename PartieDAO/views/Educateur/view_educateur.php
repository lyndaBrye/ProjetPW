<!DOCTYPE html>
<html lang="fr">  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<head>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <meta charset="UTF-8">
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<?php if ($educateur): ?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
              Educateur  <?php echo $educateur->getLicenceID()->getNumeroLicence(); ?>  <?php echo $educateur->getLicenceID()->getNom(); ?>   </a>

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
<body>
<div class=col-md-12>

    <form id="form-list-client">
        <legend></legend>



        <table class="table table-bordered table-condensed table-hover">
            <thead>
            <tr>
                <th>Numero licencie</th>
                <th>Nom licencie</th>
                <th>Prenom licencie</th>
                <th>Email licencie</th>
                <th>Statut licencie</th>
                <th>Informations sur le contact</th>
                <th>Categorie</th>
            </tr>
            </thead>
            <tbody id="form-list-client-body">
            <tr>
                <td><?php echo $educateur->getLicenceID()->getNumeroLicence(); ?></td>
                <td><?php echo $educateur->getLicenceID()->getNom(); ?></td>
                <td><?php echo $educateur->getLicenceID()->getPrenom(); ?></td>
                <td><?php echo $educateur->getEmail(); ?></td>
                <td> <?php if( $educateur->getEstAdministrateur()==1){echo "oui";} else{echo "non";} ?></td>
                <td> <?php echo $educateur->getLicenceID()->getcontactID()->getNom() . ' ' . $educateur->getLicenceID()->getcontactID()->getPrenom(); ?></td>
                <td>
                    <?php echo $educateur->getLicenceID()->getcategorieID()->getNom(); ?> </td>
            </tbody>
        </table>
    </form>

    <?php else: ?>
        <p>Aucun educateur  trouvé.</p>
    <?php endif; ?>
</body>
</html>

