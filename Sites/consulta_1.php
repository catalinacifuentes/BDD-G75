<body>
<?php
        require('conexion.php');
        $query = "SELECT vuelo.vuelo_id, vuelo.codigo_vuelo, vuelo.estado 
                FROM vuelo 
                WHERE estado = 'pendiente';";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>

    <table>
        <tr>
            <th> Vuelo id  </th>
            <th> Codigo vuelo </th>
            <th> Estado vuelo</th>
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