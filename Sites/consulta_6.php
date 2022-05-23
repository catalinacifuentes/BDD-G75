<?php
        require('conexion.php');
        $aerolinea = $_POST['aerolinea'];

        $query = "SELECT compania_aerea.nombre_compania, (COUNT(vuelo.estado):: float / MAX(tabla_2.vuelos_totales) :: float *100) as porcentaje
                FROM vuelo, compania_aerea, (SELECT compania_aerea.nombre_compania, COUNT(vuelo.estado) as vuelos_totales
                                   FROM vuelo, compania_aerea
                                   WHERE vuelo.codigo_compania = compania_aerea.codigo_compania
                                   GROUP BY Compania_aerea.nombre_compania) as tabla_2
                WHERE vuelo.codigo_compania = compania_aerea.codigo_compania AND vuelo.estado = 'aceptado' AND compania_aerea.nombre_compania = tabla_2.nombre_compania
                GROUP BY  compania_aerea.nombre_compania
                ORDER BY DESC porcentaje 
                LIMIT 1;";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>

    <table>
        <tr>
            <th> Nombre Compania  </th>
            <th> Porcentaje de vuelo aceptados</th>
        </tr>

        <?php
            foreach ($data as $d) {
                echo "<tr>
                        <td>$d[0]</td>
                        <td>$d[1]</td>
                      </tr>";
            }
        ?>
    </table>