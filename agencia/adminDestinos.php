<?php
    require 'classes/Conexion.php';
    require 'classes/Destino.php';
    $Destino=new Destino();
    $destinos=$Destino->listarDestinos();

    include 'includes/header.php';
?>
    <main class="container">
        <h1>Panel de administracion de Destinos</h1>
        <table class="table table-border table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Destino(aeropuerto)</th>
                <th>Región</th>
                <th>Precio</th>
                <th>Asientos totales</th>
                <th>Asientos disponibles</th>
                <th colspan="2">
                    <a href="" class="btn btn-dark">Agregar</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($destinos as $destino){
            ?>
            <tr>
                <td><?=$destino['destId']?></td>
                <td><?=$destino['destNombre']?></td>
                <td><?=$destino['regNombre']?></td>
                <td><?=$destino['destPrecio']?></td>
                <td><?=$destino['destAsientos']?></td>
                <td><?=$destino['destDisponibles']?></td>
                <td><a href="" class="btn btn-outline-secondary">Modificar</a></td>
                <td><a href="" class="btn btn-outline-secondary">Eliminar</a></td>
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

