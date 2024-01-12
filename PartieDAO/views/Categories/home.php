
<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des categories</title>
</head>
<body>

<!-- LIST -->
<div class=col-md-12>

    <form id="form-list-client">
        <legend>Liste des categories</legend>

        <div class="pull-right">

<!--            <a href="../../controllers/contactControllers/HomeController.php" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
-->            <a href="../controllers/categorieControllers/AddCategorieController.php" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
        </div>
        <table class="table table-bordered table-condensed table-hover">
            <thead>

            <tr>
                <th>Nom</th>
                <th>code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="form-list-client-body">
            <?php foreach ($categories as $categorie) : ?>
                <tr>
                    <td><?php echo $categorie->getNom(); ?></td>
                    <td><?php echo $categorie->getCodeRaccourci(); ?></td>

                    <td>
                        <a href="../controllers/categorieControllers/EditCategorieController.php?id=<?php echo $categorie->getId(); ?>" title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                        <a  href="../controllers/categorieControllers/DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>" title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </form>


</div>




</body>
</html>