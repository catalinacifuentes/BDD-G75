<?php
try {
    $conexion = pg_connect("host=codd.ing.puc.cl dbname=grupo75e2 user=grupo75 password=iñakiycata");

} catch (Exception $error){
    echo "No se pudo conectar a la base de datos";
}

?>