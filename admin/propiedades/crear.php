<?php
require '../../includes/funciones.php';
$auth = isAuthenticated();
if(!$auth) {
    header('Location: /');
}
//Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

$vendedoresConsulta = "SELECT * from vendedores;";
$vendedoresConsultaResultado = mysqli_query($db, $vendedoresConsulta);

// Arreglo con mensaje de errores
$errores = [];

$title = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$nombre = '';
$apellido = '';
$telefono = '';


//Ejecuta el código después de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Información general de la propiedad
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);

    //Fecha de creación del anuncio
    $creado = date('Y/m/d');

    //Datos de la propiedad
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamientos']);

    //Imagen
    $imagen = $_FILES['imagen'];

    //Datos de los vendedores existentes
    $vendedoresExistentes_id = mysqli_real_escape_string($db, $_POST['vendedor_selected']);
   
    //Datos del vendedor
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($db, $_POST['telefono']);

    

    if (!$title) {
        $errores[] = "Debes añadir un título";
    }

    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 carácteres.";
    }

    if (!$habitaciones) {
        $errores[] = "Por favor ingresa el número de habitaciones de la propiedad";
    }

    if (!$wc) {
        $errores[] = "Por favor ingresa el número de baños de la propiedad";
    }
    
    if (!$estacionamiento) {
        $errores[] = "Por favor ingresa el número de estacionamientos de la propiedad";
    }

    if (!$nombre & !$vendedoresExistentes_id or !$apellido & !$vendedoresExistentes_id or !$telefono & !$vendedoresExistentes_id) {
        $errores[] = "Por favor ingresa los datos del vendedor de la propiedad o elige un vendedor existente";
    }


    if ($nombre != NULL & $vendedoresExistentes_id != NULL) {
        $errores[] = "No se puede tener más de un vendedor por propiedad";
    }
    
    if ($apellido != NULL & $vendedoresExistentes_id != NULL) {
        $errores[] = "No se puede tener más de un vendedor por propiedad";
    }

    if ($telefono != NULL & $vendedoresExistentes_id != NULL) {
        $errores[] = "No se puede tener más de un vendedor por propiedad";
    }

    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "Es necesario subir una imagen de la propiedad";
    }

    // Validar por tamaño la imagen (1 MB máximo)
    $medida = 1000 * 1000; //Tamaño 1 megabyte

    if($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada, tamaño máximo de 1 mB";
    }

    
    if (empty($errores)) {

        /** Subir archivos */
        
        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        if(!is_dir($carpetaImagenes)) { //Verifica si la carpeta existe
            mkdir($carpetaImagenes);
        }

        //Generar nombre único para las imágenes
        $imagenNombre = md5(uniqid(rand(), true)) . ".jpg";

        //Subir la imagen
        move_uploaded_file($imagen['tmp_name'],  $carpetaImagenes . $imagenNombre);



        //Insertar en la base de datos
        try {

            $queryInsertarVendedores = "INSERT INTO vendedores (nombre, apellido, telefono) VALUES ('$nombre', '$apellido', '$telefono')";
            
            if(!$vendedoresExistentes_id){
                $resultadoInsertarVendedores = mysqli_query($db, $queryInsertarVendedores);
                
            }
            
            if(!$vendedoresExistentes_id){
                $queryConsultaVendedorId = mysqli_query($db, "SELECT id FROM vendedores WHERE nombre = '$nombre' AND apellido = '$apellido'");
                $idVendedor = mysqli_fetch_assoc($queryConsultaVendedorId);
                $vendedores_id = $idVendedor['id'];
            } else {
                $vendedores_id = $vendedoresExistentes_id;
            }
            
           

            
            $queryInsertarPropiedades = "INSERT INTO propiedades (title, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$title', '$precio', '$imagenNombre', '$descripcion', '$habitaciones', '$wc', $estacionamiento, '$creado', $vendedores_id)";
            
           
            
            if ($resultadoInsertarVendedores or $vendedoresExistentes_id != NULL) {
                $resultadoInsertarPropiedades = mysqli_query($db, $queryInsertarPropiedades);
                header('Location: /admin?resultado=1');
            }
        } catch (\Throwable $th) {
            echo "<pre>";
            var_dump($th);
            echo "</pre>";

        } 
    
    }   

}
    

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde botones-crud">Volver</a>

    <?php foreach($errores as $error):  ?>
        <div class="alerta error">
       <?php echo $error; ?>
         </div>
     <?php endforeach;?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información general</legend>
            <label for="titulo">Título</label>
            <input type="text" id="title" name="title" placeholder="Título de la propiedad" value="<?php echo $title; ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png, image/webp" name="imagen">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Añade una descripción de la propiedad"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" min="1" name="habitaciones" placeholder="Número de habitaciones de la propiedad" value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños</label>
            <input type="number" id="wc" min="1" name="wc" placeholder="Número de baños de la propiedad" value="<?php echo $wc; ?>">
            <label for="estacionamientos">Estacionamientos</label>
            <input type="number" id="estacionamientos" name="estacionamientos" min="0" placeholder="Número de estacionamientos de la propiedad" value="<?php echo $estacionamiento; ?>">


        </fieldset>

        <fieldset style="height: auto;">
            <legend>Vendedor</legend>
            <select name="vendedor_selected">
                <option value="" selected="true">--Selecciona el vendedor--</option>
            <?php while($row = mysqli_fetch_assoc($vendedoresConsultaResultado)): ?>
                <option <?php echo $vendedoresExistentes_id === $row['id'] ? 'selected' : '';?>   value="<?php echo $row['id']; ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                <?php endwhile;?>
            </select>
            <a href="#" id="boton-vendedor" class="boton boton-vendedor boton-verde">Añadir nuevo vendedor</a>
            <div id="nuevo-vendedor" class="ocultarFormularioVendedor">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del vendedor" value="<?php echo $nombre; ?>">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido del vendedor" value="<?php echo $apellido; ?>">
                <label for="telefono">Número de teléfono</label>
                <input type="text" id="telefono" name="telefono" placeholder="Número telefónico del vendedor" value="<?php echo $telefono; ?>">
            </div>
            
            
           
        </fieldset>

        <input type="submit" value="Crear propiedad" class="boton boton-verde botones-crud">

    </form>
    


</main>

<?php
incluirTemplate('footer');
?>