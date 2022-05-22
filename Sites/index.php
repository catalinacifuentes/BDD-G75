<header>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <h1> Entrega 2</h1>
</header>
    </BODY>
            <h2> Consultas</h2>
            <ul>
                <li>Vuelos pendientes de ser aprobados por la DGAC</li>
                <?php
                $conexion = pg_connect("host=localhost dbname=grupo75e2 user = grupo75 password=iñakiycata" );
                $query = "SELECT vuelo_id, codigo_vuelo FROM Vuelo WHERE estado = 'pendiente'";
                $consulta1 = pgquery($conexion, $query)
                if ($consulta1){
                if (pg_num_rows($consulta)>0){
                    echo "<p>Listado de vuelos pendientes<br>"
                    while($obj=pg_fecth_object($consulta)){
                        echo $obj->codigo_vuelo."<br>";
                    }
                }
                }
                ?>
                <li>Dado un código ICAO de un aeródromo ingresado por el usuario y una aerolínea seleccionada por el usuario, liste todos los vuelos aceptados de dicha aerolínea que tienen como destino el aeródromo</li>
                <li>Dado un código de reserva ingresado por el usuario, liste los tickets asociados a esta junto a sus pasajeros y costos.</li>
                <li>Por cada aerolínea, muestre al cliente que ha comprado la mayor cantidad de tickets.</li>
                <?php
                $conexion = pg_connect("host=localhost dbname=grupo75e2 user = grupo75 password=iñakiycata" );
                $query = "SELECT tabla.pasaporte_comprador, tabla.nombre, MAX(tabla.maximo_ticket) as maximo_ticket
                FROM ( SELECT Reserva.pasaporte_comprador, Compania_aerea.nombre, COUNT(Reserva.numero_ticket) as maximo_ticket
                FROM Reserva, Ticket, Vuelo, Compania_aerea
                WHERE Reserva,numero_ticket = Ticket.numero_ticket AND Vuelo.vuelo_id = Ticket.vuelo_id AND Compania_aerea.codigo_compania = Vuelo.codigo_compania";
                $consulta2 = pgquery($conexion, $query)
                if ($consulta2){
                if (pg_num_rows($consulta2)>0){
                    echo "<p>Listado por aerolinea<br>"
                    while($obj=pg_fecth_object($consulta2)){
                        echo $obj->tabla.nombre."-->";
                        echo $obj->tabla.pasaporte_comprador."<br>";
                    }
                }
                }
                ?>
                <li>Al ingresar el nombre de una aerolínea, liste la cantidad de vuelos que tienen en cada uno de los estados.</li>
                <li>Muestre la aerolínea que tiene el mayor porcentaje de vuelos aceptados</li>
                <?php
                $conexion = pg_connect("host=localhost dbname=grupo75e2 user = grupo75 password=iñakiycata" );
                $query = "SELECT Compania_aerea.nombre, (COUNT(Vuelo.estado)/tabla_2.vuelos_totales * 100) as porcentaje
                FROM Vuelo, Compania_aerea, (SELECT Compania_aerea.nombre, COUNT(Vuelo.estado) as vuelos_totales
                FROM Vuelo, Compania_aerea
                WHERE Vuelo.codigo_compania = Compania_aerea.codigo_compania) as tabla_2
                WHERE Vuelo.codigo_compania = Compania_aerea.codigo_compania AND Vuelo.estado = 'aceptado'
                GROUP BY  Compania_aerea.nombre";
                $consulta3 = pgquery($conexion, $query)
                if ($consulta3){
                if (pg_num_rows($consulta3)>0){
                    echo "<p>Aerolinea con mayor porcentaje de vuelos aceptados<br>"
                    while($obj=pg_fecth_object($consulta2)){
                        echo $obj->Compania_aerea.nombre"-->";
                        echo $obj->porcentaje"<br>";
                    }
                }
                }
                ?>
            </ul>
    </BODY>
<footer>
Diseñado por: Grupo75.
</footer>