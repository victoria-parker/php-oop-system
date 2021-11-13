<?php
    require 'config/config.php';
    $Region=new Region();
    $regiones=$Region->listarRegiones();
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Panel de administracion de Regiones</h1>
        <table class="table table-border table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Region</th>
                <th colspan="2">
                    <a href="formAgregarRegion.php" class="btn btn-dark">Agregar</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($regiones as $region){
            ?>
            <tr>
                <td><?=$region['regId']?></td>
                <td><?=$region['regNombre']?></td>
                <td><a href="formModificarRegion.php?regId=<?=$region['regId']?>" class="btn btn-outline-secondary">Modificar</a></td>
                <td><a href="formEliminarRegion.php?regId=<?=$region['regId']?>" class="btn btn-outline-secondary">Eliminar</a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </main>
<?php
    include 'includes/footer.php';
?>

