<?php
        require('conexion.php');
        $codigo = $_POST["codigo"];
        $aerolinea = $_POST["aerolinea"];
        $query = "SELECT vuelo_id, codigo_vuelo, vuelo.estado
                FROM vuelo 
                WHERE aerodromo_llegada_id IN (SELECT aerodromo_id
                                                FROM aerodromo
                                                WHERE codigo_icao LIKE '%$codigo%')
                AND codigo_compania IN (SELECT codigo_compania
                                        FROM compania_aerea
                                        WHERE nombre_compania LIKE '%$aerolinea%')
                AND vuelo.estado = 'aceptado';";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>

    <table>
        <tr>
            <th> Vuelo id  </th>
            <th> Codigo de Vuelo  </th>
            <th> Estado de Vuelo </th>
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