<?php
require('conexion.php');
$codigo = $_POST['codigo'];

$query_3 = "SELECT Ticket.numero_ticket, Ticket.pasaporte_pasajero, CostoTicket.valor
FROM Ticket, CostoTicket, Vuelo, Reserva
WHERE Ticket.numero_ticket  = Reserva.numero_ticket AND Vuelo.ruta_id = Costo_ticket.ruta_id AND Vuelo.codigo_aeronave = Costo_ticket.codigo_aeronave AND Ticket.codigo_vuelo = Vuelo.codigo_vuelo AND Reserva.codigo_reserva = $codigo";
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