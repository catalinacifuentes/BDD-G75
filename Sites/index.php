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
                $query_1 = "SELECT vuelo_id, codigo_vuelo FROM vuelo WHERE estado = 'pendiente'";
                $consulta1 = pgquery($conexion, $query_1);

                if ($consulta1){
                if (pg_num_rows($consulta1)>0){
                    echo "<p>Listado de vuelos pendientes<br>";
                    while($obj=pg_fecth_object($consulta1)){
                        echo $obj->codigo_vuelo."<br>";
                    }
                }
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
                FROM ( SELECT Reserva.pasaporte_comprador, Compania_aerea.nombre, COUNT(Reserva.numero_ticket) as maximo_ticket
                FROM Reserva, Ticket, Vuelo, Compania_aerea
                WHERE Reserva,numero_ticket = Ticket.numero_ticket AND Vuelo.vuelo_id = Ticket.vuelo_id AND Compania_aerea.codigo_compania = Vuelo.codigo_compania";
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
               
                $query_6 = "SELECT Compania_aerea.nombre, (COUNT(Vuelo.estado):: float / MAX(tabla_2.vuelos_totales) :: float *100) as porcentaje
                FROM Vuelo, Compania_aerea, (SELECT Compania_aerea.nombre, COUNT(Vuelo.estado) as vuelos_totales
                                           FROM Vuelo, Compania_aerea
                                           WHERE Vuelo.codigo_compania = Compania_aerea.codigo_compania
                                           GROUP BY Compania_aerea.nombre) as tabla_2
                WHERE Vuelo.codigo_compania = Compania_aerea.codigo_compania AND Vuelo.estado = 'aceptado' AND Compania_aerea.nombre = tabla_2.nombre
                GROUP BY  Compania_aerea.nombre";
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