<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Region=new Region;
    $chequeo=$Region->eliminarRegion();

    $css='danger';
    $mensaje='La Region '.$Region->getRegNombre().' no ha podido ser eliminada.';
    if($chequeo){
        $css='success';
        $mensaje='La Region '.$Region->getRegNombre().' ha sido eliminada correctamente.';
    }
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Baja de una Region</h1>
        <div class="alert alert-<?= $css ?>">
            <?= $mensaje ?>
            <br>
            <a href="adminRegiones.php" class="btn btn-light ml-2">
                volver a panel
            </a>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
