<?php
require('conexion.php');
$codigo = $_POST['codigo'];

$query_3 = "SELECT ticket.numero_ticket, ticket.pasaporte_pasajero, costo_ticket.valor
FROM ticket, costo_ticket, vuelo, reserva
WHERE ticket.numero_ticket  = reserva.numero_ticket AND vuelo.ruta_id = costo_ticket.ruta_id AND vuelo.codigo_aeronave = costo_ticket.codigo_aeronave AND ticket.codigo_vuelo = vuelo.codigo_vuelo AND reserva.codigo_reserva = $codigo";
$consulta3 = pgquery($conexion, $query_3);
if ($consulta3){
if (pg_num_rows($consulta3)>0){
    echo "<p><br>";
    while($obj=pg_fecth_object($consulta3)){
        echo $obj->Ticket.numero_ticket."-->";
        echo $obj->Ticket.pasaporte_pasajero."-->";
        echo $obj->CostoTicket.valor."<br>";
    }
}
}

?>