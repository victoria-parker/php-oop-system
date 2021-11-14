<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Proyecto Agencia</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/sweetalert2.css">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="js/sweetalert2.js"></script>
    </head>
    <body>

    <header class="mb-3 shadow-sm">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Proyecto Agencia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="admin.php">Inicio</a>
                    <?php
                    //si esta logueado
                    if(isset($_SESSION['login'])){
                    ?>
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
                        <?php
                        //si no esta logueado
                    }else{
                    ?>
                    <a class="nav-item nav-link" href="formLogin.php">Login</a>
                    <?php
                    }
                    ?>
                    <a class="nav-item nav-link" href="adminRegiones.php">Regiones</a>
                    <a class="nav-item nav-link" href="adminDestinos.php">Destinos</a>
                </div>
            </div>
        </nav>

    </header>
