<?php 
//Conexión a base de datos
require 'includes/config/database.php';
$db = conectarDB();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try {

    
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }
    
    if(!$password) {
        $errores[] = "La contraseña es obligatoria o no es válida";
    }

    if(empty($errores)) {
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if($resultado->num_rows) {
            //Revisar si el password es correcto
           $usuario = mysqli_fetch_assoc($resultado);
            //Verificar password
           $auth = password_verify($password, $usuario['password']);

           if($auth){
            //El usuario está autenticado
           session_start();
           $_SESSION['usuario'] = $usuario['email'];
           $_SESSION['login'] = true;

           header('Location: /admin');
           } else {
            $errores[] = "La contraseña es incorrecta.";
           }
        } else {
            $errores[] = "El usuario no existe.";
        }
    }

} catch(\Throwable $th) {
    echo "<pre>";
    var_dump($th);
    echo "</pre>";
}
}





//Incluye el header
require 'includes/funciones.php';
incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesión</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" novalidate>

        <fieldset>
                <legend>Iniciar Sesión</legend>
                
                <label for="email">Correo electrónico</label>
                <input type="email" placeholder="Escribe el correo electrónico" id="email" name="email"/>
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Escribe aquí tu contraseña..." name="password"/>
            </fieldset>
            <input type="submit" class="boton boton-verde" value="Iniciar sesión">
        </form>
    </main>

<?php

incluirTemplate('footer');
?>