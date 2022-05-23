<?php
        require('conexion.php');
        $aerolinea = $_POST['aerolinea'];

        $query = "SELECT compania_aerea.nombre_compania, vuelo.estado, COUNT(vuelo.estado) as numero
                FROM compania_aerea, vuelo
                WHERE compania_aerea.codigo_compania = vuelo.codigo_compania AND compania_aerea.nombre_compania LIKE '%$aerolinea%'
                GROUP BY compania_aerea.nombre_compania, vuelo.estado;";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>

    <table>
        <tr>
            <th> Nombre Compania  </th>
            <th> Estado del vuelo </th>
            <th> Cantidad </th>
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