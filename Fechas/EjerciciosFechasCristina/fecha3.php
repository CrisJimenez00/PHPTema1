<?php
if (isset($_POST["btnCalcular"])) {
    $error_fecha1 = $_POST["fecha1"] == "";
    $error_fecha2 = $_POST["fecha2"] == "";
    $errores_fechas = $error_fecha1 || $error_fecha2;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio 3</title>
    <meta charset="UTF-8" />
    <style>
        .formulario {
            background-color: lightblue;
            border: 2px solid black;
        }

        .respuesta {
            background-color: lightgreen;
            border: 2px solid black;
            margin-top: 2em
        }

        h2 {
            text-align: center
        }

        form,
        .respuesta p {
            margin-left: 2em
        }
    </style>
</head>

<body>
    <h2>Fechas-Formulario</h2>
    <form action="fecha3.php" method="post">
        <p>Introduzca una fecha:
            <input type="date" value="fecha1">
        </p>
        <p>Introduzca una fecha:
            <input type="date" value="fecha2">
        </p>
        <p><button type="submit" name="btnCalcular">Calcular</button></p>
    </form>
    <?php
    if (isset($_POST["btnCalcular"]) && !$errores_fechas) {

        //Con el uso de explode obtengo un array y lo dividimos
        //por el valor que le pasamos que en este caso es la barra


        $dias = ($seg1 - $seg2) / (3600 * 24);

        $dias = abs(floor($dias));

        echo "<div class='respuesta'>";
        echo "<h2>Fechas - Resultado</h2>";
        echo "<p> Hay " . $dias . " dias de diferencia</p>";
        echo "</div>";
    }
    ?>
</body>

</html>