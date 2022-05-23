<?php
try {
    $conexion = new PDO("pgsql:host=localhost;port=5432;dbname=grupo75e2;user=grupo75;password=iñakiycata");
} catch (Exception $error){
    echo "No se pudo conectar a la base de datos: $error";
}

?>