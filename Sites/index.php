<!doctype html>
<html lang="es">
<header>
    <h1> Entrega 2</h1>
</header>
    </body>
            <h2> Consultas</h2>
            <ul>
                <li>Vuelos pendientes de ser aprobados por la DGAC</li>
                <?php
                require('conexion.php');
                $query_1 = "SELECT vuelo.vuelo_id vuelo.codigo_vuelo, vuelo.estado, FROM vuelo WHERE estado = 'pendiente'";
                $consulta1 = $conexion -> prepare($query_1);
                $result -> execute();
                $data = $result -> fetchAll();
                ?>
                <table>
                    <tr>
                        <th> vuelo id </th>
                        <th> codigovue lo </th>
                        <th> estado vuelo </th>
                    </tr>

                    <?php
                        foreach ($data as $d) {
                            echo "<tr>
                                    <td>$d[0]</td>
                                    <td>$d[1]</td>
                                    <td><a href=$d[2] target='_blank'>link</a></td>
                                </tr>";
                        }
                    ?>

                
                <li>Dado un código ICAO de un aeródromo ingresado por el usuario y una aerolínea seleccionada por el usuario, liste todos los vuelos aceptados de dicha aerolínea que tienen como destino el aeródromo</li>
                <li>Dado un código de reserva ingresado por el usuario, liste los tickets asociados a esta junto a sus pasajeros y costos.</li>
                
                <form action="consulta_4.php" method = "POST">
                <p> Ingrese codigo de reserva: <input type= "text" name= "codigo" min = 5 /> </p>
                <p> <input type="submit" value="Enviar"/> </p>
                </form>

                <li>Por cada aerolínea, muestre al cliente que ha comprado la mayor cantidad de tickets.</li>
                <?php

                $query_4 = "SELECT tabla.pasaporte_comprador, tabla.nombre, MAX(tabla.maximo_ticket) as maximo_ticket
                FROM ( SELECT reserva.pasaporte_comprador, compania_aerea.nombre, COUNT(reserva.numero_ticket) as maximo_ticket
                FROM reserva, ticket, vuelo, compania_aerea
                WHERE reserva,numero_ticket = ticket.numero_ticket AND vuelo.vuelo_id = ticket.vuelo_id AND compania_aerea.codigo_compania = vuelo.codigo_compania";
                $consulta4 = pgquery($conexion, $query_4); 

                if ($consulta4){
                if (pg_num_rows($consulta4)>0){
                    echo "<p>Listado por aerolinea<br>";
                    while($obj=pg_fecth_object($consulta4)){
                        echo $obj->tabla.nombre."-->";
                        echo $obj->tabla.pasaporte_comprador."<br>";
                    }
                }
                }
                ?>

                <li>Al ingresar el nombre de una aerolínea, liste la cantidad de vuelos que tienen en cada uno de los estados.</li>
                
                <form action="consulta_5.php" method = "POST">
                <p> Ingrese nombre de aerolina: <input type= "text" name= "aerolinea" min = 5 /> </p>
                <p> <input type="submit" value="Enviar"/> </p>
                </form>
                
                <li>Muestre la aerolínea que tiene el mayor porcentaje de vuelos aceptados</li>
                <?php
               
                $query_6 = "SELECT compania_aerea.nombre, (COUNT(vuelo.estado):: float / MAX(tabla_2.vuelos_totales) :: float *100) as porcentaje
                FROM vuelo, compania_aerea, (SELECT compania_aerea.nombre, COUNT(vuelo.estado) as vuelos_totales
                                           FROM vuelo, compania_aerea
                                           WHERE vuelo.codigo_compania = compania_aerea.codigo_compania
                                           GROUP BY compania_aerea.nombre) as tabla_2
                WHERE vuelo.codigo_compania = compania_aerea.codigo_compania AND vuelo.estado = 'aceptado' AND compania_aerea.nombre = tabla_2.nombre
                GROUP BY  compania_aerea.nombre";
                $consulta6 = pgquery($conexion, $query_6);

                if ($consulta6){
                if (pg_num_rows($consulta6)>0){
                    echo "<p>Aerolinea con mayor porcentaje de vuelos aceptados<br>";
                    while($obj=pg_fecth_object($consulta6)){
                        echo $obj->Compania_aerea.nombre."-->";
                        echo $obj->porcentaje."<br>";
                    }
                }
                }
                ?>
            </ul>
    </body>
<footer>
Diseñado por: Grupo75.
</footer>
</html>