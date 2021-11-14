<?php
    require 'config/config.php';
    $Destino=new Destino;
    $chequeo=$Destino->agregarDestino();
    $css='danger';
    $mensaje='No se pudo agregar el destino';

    if($chequeo){
        $css='success';
        $mensaje='Destino: '.$Destino->getDestNombre().' agregada correctamente';
        $mensaje.=' con el id:'.$Destino->getDestId();
    }
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Alta de un nuevo Destino</h1>

        <div class="alert alert-<?=$css?>">
            <?=$mensaje?>
            <br>
            <a href="adminDestinos.php" class="btn btn-outline-secondary">volver al panel de destinos</a>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
