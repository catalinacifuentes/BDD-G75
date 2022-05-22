<?php
require('conexion.php');
$aerolinea = $_POST['aerolinea'];

$query_5 = "SELECT Compania_aerea.nombre,Vuelo.estado, COUNT(Vuelo.estado) as numero
FROM Compania_aerea, Vuelo
WHERE Compania_aerea.codigo_compania = Vuelo.codigo_compania AND Compania_aerea.nombre = $aerolinea
GROUP BY Compania_aerea.nombre, Vuelo.estado";
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