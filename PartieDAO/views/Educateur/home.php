<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Educateurs</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style>
        .hidden-row {
            display: none;
        }
    </style>
</head>
<body>
<div class="col-md-12">
    <form id="form-list-client">
        <legend>Liste des Educateurs</legend>

        <div class="pull-right">
            <a href=".././controllers/educateurControllers/AddEducateurController.php" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
        </div>

        <table class="table table-bordered table-condensed table-hover">
            <thead>
            <tr>
                <th>Numero de licence</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="form-list-client-body">
            <?php
            $count = 0;
            foreach ($educateurs as $educateur) :
                echo '<tr>';
                ?>
                <td><?php echo $educateur->getLicenceID()->getNumeroLicence(); ?></td>
                <td><?php echo $educateur->getEmail(); ?></td>
                <td>
                    <a href=".././controllers/educateurControllers/ViewEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" title="Voir cet éducateur" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                    <a href=".././controllers/educateurControllers/EditEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" title="Éditer cet éducateur" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                    <a href=".././controllers/educateurControllers/DeleteEducateurController.php?id=<?php echo $educateur->getIdEducateur(); ?>" title="Supprimer cet éducateur" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                </td>
                </tr>
                <?php
                $count++;
            endforeach;
            ?>
            </tbody>
        </table>
    </form>

    <!-- Ajout de la pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            // Calcul du nombre de pages
            $count = count($educateurs);
            for ($i = 1; $i <= ceil($count / 8); $i++) {
                echo '<li class="page-item">
                            <a class="page-link" href="#" onclick="loadPage(' . $i . ')">' . $i . '</a>
                          </li>';
            }
            ?>
        </ul>
    </nav>
</div>

<script>
    $(document).ready(function () {
        loadPage(1); // Load the first page initially
    });

    function loadPage(page) {
        // Cacher toutes les lignes
        $('tr').hide();

        // Afficher les lignes de la page spécifiée
        var startIndex = (page - 1) * 8;
        var endIndex = startIndex + 8;
        $('tr').slice(startIndex, endIndex).show();
    }
</script>
</body>
</html>
