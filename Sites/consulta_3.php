<?php
        require('conexion.php');
        $codigo = $_POST["codigo"];
        $query = "SELECT ticket.numero_ticket, ticket.pasaporte_pasajero, costo_ticket.valor
                FROM ticket, costo_ticket, vuelo, reserva
                WHERE ticket.numero_ticket  = reserva.numero_ticket 
                AND vuelo.ruta_id = costo_ticket.ruta_id 
                AND vuelo.codigo_aeronave = costo_ticket.codigo_aeronave AND ticket.vuelo_id = vuelo.vuelo_id 
                AND reserva.codigo_reserva = $codigo;";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>

    <table>
        <tr>
            <th> Numero de Ticket  </th>
            <th> Pasaporte pasajero  </th>
            <th> Costo del ticket </th>
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                        <td>$d[2]</td>
                      </tr>";
            }
        ?>
    </table>
    <!--  -->