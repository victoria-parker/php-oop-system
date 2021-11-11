<?php
    require 'classes/Conexion.php';
    require 'classes/Region.php';
    $Region= new Region();
    $Region->verRegionPorId();
    include 'includes/header.php';
?>

    <main class="container">
        <h1>Modificación de una región</h1>

        <div class="alert bg-light border border-secondary border round p-4">

            <form action="modificarRegion.php" method="post">

                <div class="form-group">
                    <label for="regNombre">Nombre de la región:</label>
                    <input type="text" name="regNombre"
                           id="regNombre" class="form-control" value="<?=$Region->getRegNombre()?>">
                </div>

                <button class="btn btn-dark">Modificar</button>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">
                    Volver a panel de regiones
                </a>
            </form>

        </div>


    </main>
<?php
include 'includes/footer.php';
?>