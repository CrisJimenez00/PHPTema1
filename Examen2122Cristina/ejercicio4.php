<?php
if (isset($_POST["btnEnviar"])) {
    $error_archivo = $_FILES["archivo"]["tmp_name"] != "" && ($_FILES["archivo"]["error"]
        || $_FILES["archivo"]["type"] != "text/plain" || $_FILES["archivo"]["size"] > (1000000));
    if ($error_archivo) {
        @$var = move_uploaded_file($_FILES["archivo"]["tmp_name"], "Horario/horarios.txt");
    }
}
//Función que separa una oración
function mi_srtlen($texto)
{
    $contador = 0;
    //Recorremos la palabra y hacemos un contador que cuente las letras
    while (isset($texto[$contador])) {
        $contador++;
    }
    return $contador;
}
//Función que separa el texto
function mi_explode($sep, $texto)
{
    $aux = [];
    $long_texto = mi_srtlen($texto);
    $i = 0;
    //En caso de que se empiece a leer por el separador
    while ($i < $long_texto && $texto[$i] == $sep) {
        $i++;
    }
    if ($i < $long_texto) {
        $j = 0;
        $aux[$j] = $texto[$i];
        for ($k = $i + 1; $k < $long_texto; $k++) {
            if ($texto[$k] != $sep) {
                $aux[$j] .= $texto[$k];
            } else {
                while ($k < $long_texto && $texto[$k] == $sep) {
                    $k++;
                }
                if ($k < $long_texto) {
                    $j++;
                    $aux[$j] = $texto[$k];
                }
            }
        }
    }
    return $aux;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Ejercicio 4</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <?php
    @$file = fopen("*/Horario/horarios.txt", "r");
    if (!$file) {
    ?>
        <h2>No se encuentra el documento Horario/horarios.txt</h2>
    <?php
    } else {
        echo "Veo los horarios";
    }
    ?>
    <form action="ejercicio4.php" method="post" enctype="multipart/form-data">
        <input type="file" accept="texto/*" id="texto" name="texto" />
        <?php
        if (isset($_POST["btnEnviar"]) && $error_archivo) {

            if ($_FILES["texto"]["error"]) {

                echo "*Error en la subida de la texto al servidor*";
            } else if ($_FILES["texto"]["type"] != "text/plain") {

                echo "*No has seleccionado un archivo texto*";
            } else {

                echo "*el tamaño del archivo seleccionado es mayor de 1000000KB*";
            }
        }

        ?>
        <button type="submit" name="btnEnviar">Enviar</button>
    </form>
    <?php
    if (isset($_POST["btnEnviar"]) && !$error_archivo) {
        @$var = move_uploaded_file($_FILES["texto"]["tmp_name"], "*/Horario/" . $_FILES["texto"]["tmp_name"]);
        echo "*Se ha subido con éxito*";
    } else {
        echo "Veo los horarios";
        fclose($file);
    }

    ?>
</body>

</html>