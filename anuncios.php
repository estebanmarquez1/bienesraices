<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Casas y apartamentos en venta</h1>
        <!-- <div class="contenedor-anuncios-total"> -->
        <?php 
        $limite = 10;
        include 'includes/templates/anuncios.php';
        ?>

        <!-- </div> -->
    </main>

    <?php incluirTemplate('footer'); ?>
