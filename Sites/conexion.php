<?php
try {
    $conexion = new PDO("pgsql:dbname=grupo75e2;host=codd.ing.puc.cl;user=grupo75;password=iñakiycata");
} catch (Exception $error){
    echo "No se pudo conectar a la base de datos: $error";
}

?>