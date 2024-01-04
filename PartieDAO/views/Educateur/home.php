<!DOCTYPE html>
<html lang="fr">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<head>
    <meta charset="UTF-8">
    <title>Liste des Educateurs</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<div class=col-md-12>

    <form id="form-list-client">
<legend>Liste des Educateurs</legend>

<div class="pull-right">
<!--    <a href="../../controllers/educateurControllers/HomeController.php" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
-->    <a href=".././controllers/educateurControllers/AddEducateurController.php" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
</div>
    <?php
    if (count($educateurs) > 0): ?>
        <table class="table table-bordered table-condensed table-hover">

        <thead>
                <tr>
                    <th>Numero licencie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="form-list-client-body">
                <?php foreach ($educateurs as $educateur): ?>
                    <tr>
                        <td><?php echo $educateur->getLicenceID()->getNumeroLicence(); ?></td>

                        <td>
                            <a href=".././controllers/educateurControllers/ViewEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                            <a href=".././controllers/educateurControllers/EditEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>

                            <a  href=".././controllers/educateurControllers/DeleteEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                        </td>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

    <?php else: ?>
        <p>Aucun educateur  trouvé.</p>
    <?php endif; ?>
</body>
</html>

