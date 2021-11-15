<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Destino=new Destino;
    $chequeo=$Destino->modificarDestino();
    $css='danger';
    $mensaje='No se han modificado los datos del destino';
    if($chequeo){
        $css='success';
        $mensaje='Destino: '.$Destino->getDestNombre().' modificado correctamente';
    }
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Modificación de un Destino</h1>

        <div class="alert alert-<?=$css?>">
            <?=$mensaje?>
            <br>
            <a href="adminDestinos.php" class="btn btn-outline-secondary">volver al panel de destinos</a>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
