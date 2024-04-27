<?php 
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>
    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p> Nuestra empresa se preocupa por la seguridad de nuestros clientes y sus bienes. Es por eso que contamos con sistemas de seguridad de última generación y personal capacitado para proteger y resguardar sus propiedades. Confíe en nosotros para garantizar su tranquilidad y la de su inversión.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>
                <p> Nuestros precios son competitivos en el mercado inmobiliario y ofrecemos opciones de financiamiento atractivas. Encuentra la propiedad de tus sueños al mejor precio con nuestro equipo de expertos.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo">
                <h3>Tiempo</h3>
                <p> Nuestros expertos en bienes raíces trabajan las 24 horas para ayudarte a encontrar la casa de tus sueños. Desde la búsqueda hasta el cierre, estamos aquí para guiarte en todo el proceso. ¡Haz realidad el sueño de tener tu propio hogar con nosotros!</p>
            </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y apartamentos en venta</h2>
        <?php 
        $limite = 3;
        include 'includes/templates/anuncios.php';
        ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto, para que uno de nuestros asesores, se comunique contigo lo más pronto posible.</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen Terraza">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con materiales duraderos y ahorrar dinero al hacerlo.</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen Terraza">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p>Escrito el <span>2/05/2022</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron, cumple con todas mis expectativas.</blockquote>
                <p>- Esteban Márquez</p>
            </div>
        </section>
    </div>

    <?php incluirTemplate('footer'); ?>
  