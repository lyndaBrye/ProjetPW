<!DOCTYPE html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar">Accueil</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                Club Sportif
            </a>
            <a class="" href="Educateur/logout.php"> Deconnexion</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar" >
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">Accueil</a></li>
            <li><a href="#" onclick="loadLicencieContent()">Licencié</a></li>
            <li><a href="#" onclick="loadEducateurContent()">Educateur</a></li>
            <li><a href="#" onclick="loadContactContent()">Contact</a></li>
            <li><a href="#" onclick="loadCategorieContent()">Categorie</a></li>

        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dashboard
            </div>
            <div class="panel-body" id="dashboard-content">

            </div>
        </div>
    </div>
    <footer class="pull-left footer">
        <p class="col-md-12">
        <hr class="divider">
        Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>
        </p>
    </footer>
</div>

<script>
    function loadLicencieContent() {
        $.ajax({
            url: '../controllers/licencieControllers/HomeController.php',
            type: 'GET',
            success: function (data) {
                $('#dashboard-content').html(data);
              //  attachLicencieEvents();

            },
            error: function () {
                alert('Erreur lors du chargement du contenu de Licencié.');
            }
        });
    }



    function loadContactContent() {
        $.ajax({
            url: '../controllers/contactControllers/HomeController.php',
            type: 'GET',
            success: function (data) {
                $('#dashboard-content').html(data); // Utilisez le bon identifiant ici
            },
            error: function () {
                alert('Erreur lors du chargement du contenu de contact.');
            }
        });
    }

    function loadEducateurContent() {
        $.ajax({
            url: '../controllers/educateurControllers/HomeController.php',
            type: 'GET',
            success: function (data) {
                $('#dashboard-content').html(data); // Utilisez le bon identifiant ici
            },
            error: function () {
                alert('Erreur lors du chargement du contenu de educateur.');
            }
        });
    }

    function loadCategorieContent() {
        $.ajax({
            url: '../controllers/categorieControllers/HomeController.php',
            type: 'GET',
            success: function (data) {
                $('#dashboard-content').html(data); // Utilisez le bon identifiant ici
            },
            error: function () {
                alert('Erreur lors du chargement du contenu de categorie.');
            }
        });
    }

</script>
