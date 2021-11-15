<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    $Destino=new Destino;
    $Destino->verDestinoPorId();
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Baja de un Destino</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">
            <form action="eliminarDestino.php" method="post">
                <span class="lead">Se eliminará el destino <?= $Destino->getDestNombre(); ?> </span>
                <br>
                Region: <?= $Destino->getRegNombre() ?> <br>
                Precio: $<?= $Destino->getDestPrecio() ?> <br>

                <input type="hidden" name="destNombre"
                       value="<?= $Destino->getDestNombre() ?>">
                <input type="hidden" name="destId"
                       value="<?= $Destino->getDestId() ?>">
                <button class="btn btn-danger">
                    Confirmar Baja
                </button>
                <a href="adminDestinos.php" class="btn btn-outline-secondary">
                    Volver a panel de destinos
                </a>
            </form>
        </div>

            <script>
                Swal.fire({
                    title: 'Desea eliminar la region?',
                    text: "Esta acción no se puede deshacer",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No la quiero eliminar',
                    cancelButtonColor: '#7e7b7b',
                    confirmButtonColor: '#dd0000',
                    confirmButtonText: 'Si la quiero eliminar!'
                }).then((result) => {
                    if (!result.value) {
                        //redireccion al panel
                        window.location='adminDestinos.php';
                    }
                })
            </script>
    </main>
<?php
    include 'includes/footer.php';
?>
