<body>
<?php
        require('conexion.php');
        $query = "SELECT  MIN(tabla.nombre_compania), tabla.pasaporte_comprador, MAX(tabla.maximo_ticket) as maximo_ticket
        FROM ( SELECT reserva.pasaporte_comprador, compania_aerea.nombre_compania, COUNT(reserva.numero_ticket) as maximo_ticket
        FROM reserva, ticket, vuelo, compania_aerea
        WHERE reserva.numero_ticket = ticket.numero_ticket AND vuelo.vuelo_id = ticket.vuelo_id AND compania_aerea.codigo_compania = vuelo.codigo_compania
        GROUP BY reserva.pasaporte_comprador,  compania_aerea.nombre_compania)as tabla
        GROUP BY tabla.nombre_compania";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>
    <table>
        <tr>
            <th> Nombre Compania Aerea  </th>
            <th> Pasaporte pasaporte_comprador  </th>
            <th> Numero de tickets </th>
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