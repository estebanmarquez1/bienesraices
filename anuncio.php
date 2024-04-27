<?php 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id) {
        header('Location: /');
    }

    //Importar la base de datos
    
    require 'includes/config/database.php';
    
    $db = conectarDB();

    //Consultar 
    $query = "SELECT * FROM propiedades WHERE id = $id";
    
    //Obtener el resultado
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    if(!$resultado->num_rows) {
        header('Location: /');
    }

    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['title'];?></h1>
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio Propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo number_format($propiedad['precio']);?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorios">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion'];?></p>
            

        </div>
    </main>



    <?php 
    mysqli_close($db);
    incluirTemplate('footer'); 
    ?>
  
