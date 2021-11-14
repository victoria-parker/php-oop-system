<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Region=new Region;
    $chequeo=$Region->modificarRegion();
    $css='danger';
    $mensaje='No se han modificado los datos de la región';
    if($chequeo){
        $css='success';
        $mensaje='Región: '.$Region->getRegNombre().' modificada correctamente';
    }
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Modificacion de una Región</h1>

        <div class="alert alert-<?=$css?>">
            <?=$mensaje?>
            <br>
            <a href="adminRegiones.php" class="btn btn-outline-secondary">volver al panel de regiones</a>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
