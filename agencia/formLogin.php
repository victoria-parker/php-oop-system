<?php
    require 'config/config.php';
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Ingreso Sistema</h1>
        <div class="alert bg-light border col-6 mx-auto">
        <form action="login.php" method="post">
            Usuario:
            <br>
            <input type="text" name="usuEmail"  class="form-control">
            <br>
            Contraseña:
            <br>
            <input type="password" name="usuClave" class="form-control">
            <br>
            <button class="btn btn-dark btn-block">Ingresar a sistema</button>
        </form>
        </div>
    </main>
<?php
    include 'includes/footer.php';
?>
