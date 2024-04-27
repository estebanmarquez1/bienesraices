<?php 
    //Importar la base de datos
    
    require __DIR__ . '/../config/database.php';
    
    $db = conectarDB();

    //Consultar 
    $query = "SELECT * FROM propiedades LIMIT $limite";
    
    //Obtener el resultado
    $resultado = mysqli_query($db, $query);
    
    
    
?>
<div class="contenedor-anuncios">
<?php while($propiedad = mysqli_fetch_assoc($resultado)):?> 
            <div class="anuncio">
                    <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio Propiedad">
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['title'];?></h3>
                    <p><?php echo $propiedad['descripcion'];?></p>
                    <p class="precio">$<?php echo number_format($propiedad['precio']);?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                            <p><?php echo $propiedad['wc']; ?></p>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorios">
                            <p><?php echo $propiedad['habitaciones'];?></p>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                            <p><?php echo $propiedad['estacionamiento'];?></p>
                        </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Ver propiedad</a>
                </div>
                <!--.contenido-anuncio-->
            </div>
            <!-- .anuncio -->

            <?php endwhile;?>
        </div>
        <!--.contenedor-anuncios-->
        
    <?php 
    //Cerrar conexión
     mysqli_close($db);
    ?> 