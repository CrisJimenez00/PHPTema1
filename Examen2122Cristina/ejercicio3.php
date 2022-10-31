<?php
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
//Control del errores
if (isset($_POST["btnContar"])) {
    $error_form = $_POST["texto"] == "";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Ejercicio 3</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <form action="ejercicio3.php" method="post">
        <label for="texto">Elija un separador </label>
        <select name="sep" id="sep">
            <option <?php
                    if (isset($_POST["sep"]) && $_POST["sep"] == ";") {
                        echo "selected";
                    } ?> value=";">; (punto y coma)</option>
            <option <?php
                    if (isset($_POST["sep"]) && $_POST["sep"] == ",") {
                        echo "selected";
                    } ?> value=",">, (coma)</option>
            <option <?php
                    if (isset($_POST["sep"]) && $_POST["sep"] == ":") {
                        echo "selected";
                    } ?> value=":">: (dos puntos)</option>
            <option <?php
                    if (isset($_POST["sep"]) && $_POST["sep"] == " ") {
                        echo "selected";
                    } ?> value=" "> (espacio)</option>
        </select>
        <label for="texto">Introduzca una frase </label>
        <input type="text" name="texto" id="texto" value=<?php if (isset($_POST["texto"])) {
                                                                echo $_POST["texto"];
                                                            } ?>>
        <?php
        if (isset($_POST["btnContar"]) && $error_form) {
            echo "<span>*Campo Vacío*</span>";
        } ?>
        <button type="submit" name="btnContar">Contar</button>
    </form>
    <?php
    if (isset($_POST["btnContar"])) {
        echo "<h1>Respuesta</h1>";
        echo "<p>La longitus del texto introducido es de: " . count(mi_explode($_POST["sep"], $_POST["texto"])) . "</p>";
    }

    ?>
</body>

</html>