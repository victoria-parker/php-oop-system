<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Region=new Region;
    $cantidad=$Region->verificarRegion();
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Baja de una region</h1>
        <?php
        if($cantidad > 0){
        ?>
            <div class="alert alert-danger col-5 mx-auto p-3">
                No se puede eliminar la Region <?=$Region->getRegNombre()?> ya que tiene destinos relacionados
                <br>
                <a href="adminRegiones.php" class="btn btn-outline-secondary">volver al panel</a>
            </div>
        <?php
        }else{
        ?>
            <div class="card col-6 mx-auto p-0 border-danger text-danger">
                <div class="card-header">
                    Confirmación de baja de una Región
                </div>
                <div class="card-body">
                    <span class="lead">
                        <?=$Region->getRegNombre()?>
                    </span>
                    <form action="eliminarRegion.php" method="post">
                        <input type="hidden" name="regID" value="<?=$Region->getRegID()?>">
                        <input type="hidden" name="regNombre" value="<?=$Region->getRegNombre()?>">
                        <button class="btn btn-danger btn-block my-2">Confirmar Baja</button>
                        <a href="adminRegiones.php" class="btn btn-outline-secondady btn-block">Volver al panel</a>
                    </form>
                </div>
            </div>

            <script>
                Swal.fire({
                    title: 'Desea eliminar la region?',
                    text: "Esta acción no se puede deshacer",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No la quiero eliminar',
                    cancelButtonColor: '#7e7b7b',
                    confirmButtonColor: '#d00',
                    confirmButtonText: 'Si la quiero eliminar!'
                }).then((result) => {
                    if (!result.value) {
                        //redireccion al panel
                        window.location='adminRegiones.php';
                    }
                })
            </script>
        <?php
        }
        ?>
    </main>
<?php
    include 'includes/footer.php';
?>
