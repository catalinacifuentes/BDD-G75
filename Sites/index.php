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
        
            </ul>
    </body>
<footer>
Diseñado por: Grupo75.
</footer>
</html>