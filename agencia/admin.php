<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Dashboard</h1>
        <h2>Bienvenido <?=$_SESSION['usuNombre']?></h2>
    <section class="list-group">
        <a href="adminRegiones.php" class="list-group-item list-group-item-action">Panel de administración de regiones</a>
        <a href="adminDestinos.php" class="list-group-item list-group-item-action">Panel de administración de destinos</a>
    </section>
    </main>
<?php
    include 'includes/footer.php';
?>
