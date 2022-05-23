<?php
        require('conexion.php');
        $query = "SELECT vuelo.vuelo_id, vuelo.codigo_vuelo, vuelo.estado 
                FROM vuelo 
                WHERE estado = 'pendiente';";
        $result = $conexion -> prepare($query);
        $result -> execute();

        $data = $result -> fetchAll();
                    
    ?>