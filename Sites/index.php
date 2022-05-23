<!doctype html>
<html lang="es">
<header>
    <h1> Entrega 2</h1>
</header>
    </body>
            <h2> Consultas</h2>
            <ul>
                <li>Vuelos pendientes de ser aprobados por la DGAC</li>
                <form align="center" action="consulta_1.php" method="post">
                    <p> Haz click para ver la consulta </p>
                    <input type="submit" name="Buscar">

    </form>
                <li>Dado un código ICAO de un aeródromo ingresado por el usuario y una aerolínea seleccionada por el usuario, liste todos los vuelos aceptados de dicha aerolínea que tienen como destino el aeródromo.</li>
                <form align="center" action="consulta_2.php" method="post">
                    <label> Nombre Aerolinea<label>
                    <select name="aerolinea">
                    <option value="0">Seleccione</option>
                    <?php
                    include('conexion.php');
                    $aerolinea="SELECT DISTINCT nombre_compania
                                FROM compania_aerea;";
                    $result = $conexion -> prepare($query);
                    $result -> execute();
                    $data = $result -> fetchAll();
                    foreach ($data as $d){
                        echo '<option_value="'.$d[0].'">'.$d[0].'</option>';
                    }           

                    ?>
                    </select><br><br>
                    <p> Ingrese codigo ICAO </p>
                    <input type="text" name="codigo">
                    <p> Haz click para ver la consulta </p>
                    <input type="submit" name="Buscar">
    </form>
                <li>Dado un código de reserva ingresado por el usuario, liste los tickets asociados a esta junto a sus pasajeros y costos.</li>
                <form align="center" action="consulta_3.php" method="post">
                    <p> Ingrese codigo de reserva </p>
                    <input type="text" name="codigo">
                    <p> Haz click para ver la consulta </p>
                    <input type="submit" name="Buscar">

    </form>                     
                <li>Por cada aerolínea, muestre al cliente que ha comprado la mayor cantidad de tickets.</li>
                <form align="center" action="consulta_4.php" method="post">
                    <p> Haz click para ver la consulta </p>
                    <input type="submit" name="Buscar">

    </form>
                <li>Al ingresar el nombre de una aerolínea, liste la cantidad de vuelos que tienen en cada uno de los estados.</li>
                <form align="center" action="consulta_5.php" method="post">
                    <p> Ingrese nombre de la aerolinea </p>
                    <input type="text" name="aerolinea">
                    <p> Haz click para ver la consulta </p>
                    <input type="submit" name="Buscar">
    </form>
                <li>Muestre la aerolínea que tiene el mayor porcentaje de vuelos aceptados.</li>
                <form align="center" action="consulta_6.php" method="post">
                    <p> Haz click para ver la consulta </p>
                    <input type="submit" name="Buscar">
    </form>
            </ul>
    </body>
<footer>
Diseñado por: Grupo75.
</footer>
</html>