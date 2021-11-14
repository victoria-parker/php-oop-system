<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Region=new Region;
    $chequeo=$Region->agregarRegion();
    $css='danger';
    $mensaje='No se pudo agregar la región';

    if($chequeo){
        $css='success';
        $mensaje='Región: '.$Region->getRegNombre().' agregada correctamente';
        $mensaje.=' con el id:'.$Region->getRegID();
    }
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Alta de una nueva Región</h1>

        <div class="alert alert-<?=$css?>">
            <?=$mensaje?>
            <br>
            <a href="adminRegiones.php" class="btn btn-outline-secondary">volver al panel de regiones</a>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
