<?php
require '../includes/funciones.php';

$auth = isAuthenticated();
if(!$auth) {
    header('Location: /');
}

//Importar la conexión
require '../includes/config/database.php';
$db = conectarDB();

//Escribir el query
$query = "SELECT * FROM propiedades";

//Consultar la base de datos
$resultadoQuery = mysqli_query($db, $query);


//Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id) {
        //Eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultadoImagen = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultadoImagen);

        unlink('../imagenes/' . $propiedad['imagen']);

        //Eliminar la propiedad 
        $query = "DELETE FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        
        if($resultado) {
            header('location: /admin?resultado=3');
        }
    }
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php elseif(intval($resultado) === 2): ?>
        <p class="alerta exito">Anuncio actualizado correctamente</p>
    <?php elseif(intval($resultado) === 3): ?>
        <p class="alerta exito">Anuncio eliminado correctamente</p>
    <?php endif; ?>
    <div class="botones-crud">
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear</a>
    </div>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoQuery)): ?>
                <tr>
                    <td><?php echo $propiedad['id'];?></td>
                    <td><?php echo $propiedad['title'];?></td>
                    <td>

                        <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen'];?>">
                    </td>
                   
                    <td>$<?php echo number_format($propiedad['precio']);?></td>

                    <td>
                        <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                        <input type="submit"  class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</main>

<?php

//Cerrar la conexión
mysqli_close($db);
incluirTemplate('footer');
?>