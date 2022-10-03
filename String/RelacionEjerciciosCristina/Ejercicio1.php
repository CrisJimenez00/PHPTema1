<?php
if (isset($_POST["comparar"])) {
    $error_primera = strlen($_POST["texto1"]) < 3;
    $error_segunda = strlen($_POST["texto2"]) < 3;
    $error_form = $error_primera || $error_segunda;
}
?>

<DOCTYPE html>
    <html lang="es">

    <head>
        <title>Formulario</title>
        <meta charset="UTF-8" />
    </head>

    <body>
        <form method="post" action="Ejercicio1.php" enctype="multipart/form-data">
            <h2>Ripios - Formulario</h2>
            <p>Dime dos palabaras y te dire si riman o no</p>
            Primera palabra: <input type="text" name="texto1" value="<?php if (isset($_POST["texto1"])) echo $_POST["texto1"] ?>" />
            <?php if (isset($_POST["comparar"]) && ($_POST["texto1"] == "")) echo "*Campo obligatorio*";
            else if (isset($_POST["comparar"]) && strlen($_POST["texto1"]) < 3) echo "*teclee al menos 3 caracteres*" ?>
            <br />
            Segunda palabra: <input type="text" name="texto2" value="<?php if (isset($_POST["texto2"])) echo $_POST["texto2"] ?>" />
            <?php if (isset($_POST["comparar"]) && ($_POST["texto2"] == "")) echo "*Campo obligatorio*";
            else if (isset($_POST["comparar"]) && strlen($_POST["texto2"]) < 3) echo "*teclee al menos 3 caracteres*" ?>
            <br />
            <button type="submit" name="comparar">Comparar</button>


        </form>
        <?php
        if (isset($_POST["comparar"]) && !$error_form) {
            $texto1 = trim(strtoupper($_POST["texto1"]));
            $texto2 = trim(strtoupper($_POST["texto2"]));
            $l_texto1 = strlen($_POST["texto1"]);
            $l_texto2 = strlen($_POST["texto2"]);

            $respuesta = "no riman";

            if ($texto1[$l_texto1-1] == $texto2[$l_texto2-1] && $texto1[$l_texto1-2] == $texto2[$l_texto2-2]) {

                $respuesta = "riman un poco";

                if ($texto1[$l_texto1 - 3] == $texto2[$l_texto2 - 3]) {

                    $respuesta = "riman";

                }

                echo "<p>las palabras" . $texto1 . " y " . $texto2 . " " . $respuesta . "</p>";
                
            }
        }
        ?>
    </body>

    </html>