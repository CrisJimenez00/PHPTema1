<?php
if (isset($_POST["btnComparar"])) {

    $error_texto = $_POST["texto"] == "" || strlen($_POST["texto"]) < 3;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio2</title>
    <meta charset="UTF-8" />
    <style>
        .formulario {
            background-color: lightblue;
            border: 2px solid black;
        }

        .respuesta {
            background-color: lightgreen;
            border: 2px solid black;
        }

        h2 {
            text-align: center;
        }

        form,
        .respuesta p {
            margin-left: 2em;
        }
    </style>
</head>

<body>
    <div class="formulario">
        <h2>Fechas - Formulario</h2>
        <form action="fecha1.php" method="post" enctype="multipart/form-data">

            <!--Donde se introducen los datos-->
            <!--Fecha 1-->
            <p><label for="text">Introduzca una fecha: (DD/MM/YYYY) </label>
                <input type="text" name="texto" id="text" value="<?php if (isset($_POST["texto"])) echo $_POST["texto"]; ?>" />
                <?php
                if (isset($_POST["btnComparar"]) && $error_texto) {

                    if ($_POST["texto"] == "" ) {

                        echo "*Campo vacío*";
                    } else {

                        echo "La fecha no es válida";
                    }
                }
                ?>
            </p>

            <!--Fecha 2-->
            <p><label for="text">Introduzca una fecha: (DD/MM/YYYY) </label>
                <input type="text" name="texto" id="text" value="<?php if (isset($_POST["texto"])) echo $_POST["texto"]; ?>" />
                <?php
                if (isset($_POST["btnComparar"]) && $error_texto) {

                    if ($_POST["texto"] == "" ) {

                        echo "*Campo vacío*";
                    } else {

                        echo "La fecha no es válida";
                    }
                }
                ?>
            </p>

            <!--Parte del botón-->
            <p><button type="submit" name="btnComparar">Comprobar</button></p>
        </form>
    </div>
    <?php
    if (isset($_POST["btnComparar"]) && !$error_texto) {

        $texto = strtolower($_POST["texto"]);

        echo "<div class='respuesta'>";
        echo "<h2>Fechas - Respuesta</h2>";
        if (is_numeric($texto)) {

            if ($texto == strrev($texto)) {

                echo "<p>El número " . $texto . " es capícua</p>";
            } else {

                echo "<p>El número " . $texto . " no es capícua</p>";
            }
        } else {

            if ($texto == strrev($texto)) {

                echo "<p>El texto " . $texto . " es palíndromo</p>";
            } else {

                echo "<p>El texto " . $texto . " no es palíndromo</p>";
            }
        }
        echo "</div>";
    }
    ?>

</body>

</html>