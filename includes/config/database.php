<?php 

function conectarDB() {
    $db = mysqli_connect('localhost', 'root', 'Laconic1004@', 'bienesraices_crud');
    
    
    if(!$db) {
        echo("Error, no se pudo conectar");
        exit;
}
    return $db;
}

