<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <section>
            <h1>Conoce sobre nosotros</h1>
            <div class="nosotros">
                <div class="imagen-nosotros">
                    <picture>
                        <source srcset="build/img/nosotros.webp" type="image/webp">
                        <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/nosotros.img" alt="Sobre nosotros">
                    </picture>
                </div>
                <div class="texto-nosotros">
                    <blockquote>25 años de experiencia</blockquote>
                    <p>Nuestra empresa de bienes raíces cuenta con 25 años de experiencia en el mercado inmobiliario. Desde nuestros inicios, nos hemos dedicado a brindar servicios de alta calidad a nuestros clientes, y hoy en día, seguimos trabajando con
                        la misma pasión y dedicación que el primer día. </p>
                    <p>
                        Nos enorgullece haber ayudado a muchas personas a encontrar la casa de sus sueños, y sabemos que cada cliente tiene necesidades únicas. Por eso, nuestro equipo de expertos en bienes raíces se asegura de escuchar cuidadosamente a cada uno de nuestros clientes
                        para entender sus necesidades y ofrecer soluciones personalizadas. Ofrecemos una amplia variedad de propiedades en diferentes ubicaciones y rangos de precios, para que nuestros clientes tengan más opciones al elegir su hogar ideal.
                        También ofrecemos servicios de alquiler y venta de propiedades comerciales para nuestros clientes empresariales. Además, nuestro equipo de expertos está siempre actualizado sobre las últimas tendencias del mercado inmobiliario
                        y se asegura de que nuestros clientes estén informados en cada paso del proceso. Desde la búsqueda de propiedades hasta el cierre de la venta, nuestro equipo está siempre disponible para brindar asesoramiento y apoyo a nuestros
                        clientes.
                    </p>
                    <p>
                        Nos enorgullece tener una sólida reputación en la comunidad, y muchos de nuestros clientes satisfechos nos han referido a sus amigos y familiares. Creemos que esto es una prueba de nuestro compromiso con la excelencia y la satisfacción del cliente.
                    </p>

                </div>

            </div>
        </section>


    </main>
    <section class="contenedor seccion">
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
    </section>

    <?php incluirTemplate('footer'); ?>
    