<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
</head>

<body>

    <?php
    $estadios_futbol = array(
        "Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia"  => "Mestalla", "Real Sociedad" => "Anoeta"
    );
    for ($i = 0; $i < count($array_animales); $i++) {
        array_push($array_total, $array_animales[$i]);
    }
    for ($i = 0; $i < count($array_numeros); $i++) {
        array_push($array_total, $array_numeros[$i]);
    }
    for ($i = 0; $i < count($array_random); $i++) {
        array_push($array_total, $array_random[$i]);
    }

    for ($i = count($array_total) - 1; $i > 0; $i--) {
        echo "<p>" . $array_total[$i] . "</p>";
    }

    ?>

</body>

</html>