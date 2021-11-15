<?php
    require 'config/config.php';
    $Usuario=new Usuario;
    $Usuario->autenticar();
    include 'includes/header.php';
?>
    <main class="container">
        <h1>Plantilla</h1>
    </main>
<?php
    include 'includes/footer.php';
?>
