<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Ajoutez ici vos liens CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Liste des Licenciés</title>
    <style>
        .hidden-row {
            display: none;
        }
    </style>
</head>
<body>

<!-- LIST -->
<div class="col-md-12">
    <form id="form-list-client">
        <legend>Liste des licenciés</legend>

        <div class="pull-right">
            <a href="../controllers/licencieControllers/AddLicencieController.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
        </div>
        <table class="table table-bordered table-condensed table-hover">
            <thead>
            <tr>
                <th>Numéro de Licence</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Catégorie (Code Raccourci)</th>
                <th>Contact (Nom)</th>
                <th>Contact (Email)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="form-list-client-body">
            <?php
            $count = 0;
            foreach ($licencie as $licence) :
                echo '<tr class="contact-row">';
                ?>
                <td><?php echo $licence->getNumeroLicence(); ?></td>
                <td><?php echo $licence->getNom(); ?></td>
                <td><?php echo $licence->getPrenom(); ?></td>
                <td><?php echo $licence->getcategorieID()->getCodeRaccourci(); ?></td>
                <td><?php echo $licence->getcontactID()->getNom(); ?></td>
                <td><?php echo $licence->getcontactID()->getEmail(); ?></td>
                <td>
                    <a href="../controllers/licencieControllers/EditLicencieController.php?id=<?php echo $licence->getId(); ?>" title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                    <a href="../controllers/licencieControllers/DeleteLicencieController.php?id=<?php echo $licence->getId(); ?>" title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                </td>
                </tr>
                <?php
                $count++;
            endforeach;
            ?>
            </tbody>
        </table>
    </form>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            // Calcul du nombre de pages
            $count = count($licencie);
            for ($i = 1; $i <= ceil($count / 8); $i++) {
                echo '<li class="page-item">
                         <a class="page-link" href="#" onclick="loadPage(' . $i . ')">' . $i . '</a>
                         </li>';
            }
            ?>
        </ul>
    </nav>

    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="../controllers/licencieControllers/HomeController.php?action=exportCSV" class="btn btn-primary">
                <i class="fas fa-file-export"></i> Exporter CSV
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <form action="../controllers/licencieControllers/HomeController.php?action=importCSV" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="csvFile" name="csvFile" accept=".csv">
                        <label class="custom-file-label" for="csvFile">Choisissez un fichier CSV à importer</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-file-import"></i> Importer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Assurez-vous d'inclure jQuery avant le script -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        loadPage(1); // Load the first page initially
    });

    function loadPage(page) {
        // Cacher toutes les lignes
        $('tr.contact-row').hide();

        // Afficher les lignes de la page spécifiée
        var startIndex = (page - 1) * 8;
        var endIndex = startIndex + 8;
        $('tr.contact-row').slice(startIndex, endIndex).show();
    }
</script>



</body>
</html>
