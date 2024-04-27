<?php 
require 'includes/funciones.php';
incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Casa destacada">
        </picture>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque ad dicta excepturi repudiandae laudantium blanditiis, id doloremque quod placeat odio culpa obcaecati animi nihil porro vitae nemo mollitia asperiores temporibus?</p>
            <p>Totam autem iusto, similique, suscipit quibusdam excepturi minima ut amet praesentium blanditiis, et qui ipsum sunt vitae perferendis nesciunt cum exercitationem doloremque!</p>

        </div>
    </main>
    <?php incluirTemplate('footer'); ?>
   