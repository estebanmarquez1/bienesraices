<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>
        <h2>Llene el formulario de contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Información personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">Correo electrónico</label>
                <input type="email" placeholder="Correo electrónico" id="email">

                <label for="phone">Teléfono</label>
                <input type="tel" placeholder="Número telefónico" id="phone">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" placeholder="Escribe aquí tu mensaje..."></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="option">Vende o compra</label>
                <select>
                    <option value="" disabled selected> --Seleccione una opción--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>

                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto"></label>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>¿Cómo desea ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono">

                    <label for="contactar-email">Correo electrónico</label>
                    <input name="contacto" type="radio" value="email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora para ser contactado.</p>

                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha">

                <label for="hora">Hora: </label>
                <input type="time" id="hora">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde" id="boton-enviar">

        </form>
    </main>

    <?php incluirTemplate('footer'); ?>
    