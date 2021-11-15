<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Destino=new Destino;
    $chequeo=$Destino->eliminarDestino();

    $css='danger';
    $mensaje='El destino '.$Destino->getDestNombre().' no ha podido ser eliminada.';
    if($chequeo){
        $css='success';
        $mensaje='El destino '.$Destino->getDestNombre().' ha sido eliminado correctamente.';
    }
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Baja de un Destino</h1>
        <div class="alert alert-<?= $css ?>">
            <?= $mensaje ?>
            <br>
            <a href="adminDestinos.php" class="btn btn-light ml-2">
                volver a panel
            </a>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
