<?php
require('conexion.php');
$aerolinea = $_POST['aerolinea'];

$query_5 = "SELECT compania_aerea.nombre,vuelo.estado, COUNT(vuelo.estado) as numero
FROM compania_aerea, Vuelo
WHERE compania_aerea.codigo_compania = vuelo.codigo_compania AND compania_aerea.nombre = $aerolinea
GROUP BY compania_aerea.nombre, vuelo.estado";
$consulta5 = pgquery($conexion, $query_5);
if ($consulta5){
if (pg_num_rows($consulta3)>0){
    echo "<p>Cantidad de vuelos por estado<br>";
    while($obj=pg_fecth_object($consulta5)){
        echo $obj->Vuelo.estado."-->";
        echo $obj->numero."<br>";
    }
}
}

?>