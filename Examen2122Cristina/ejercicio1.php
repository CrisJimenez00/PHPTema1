<?php
function mi_srtlen($texto)
{
    $contador = 0;
    //Recorremos la palabra y hacemos un contador que cuente las letras
    while (isset($texto[$contador])) {
        $contador++;
    }
    return $contador;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Ejercicio 1</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <p>Realizar una página php que contenga un formulario con un campo de texto y un botón.
        Este botón al pulsarse, nos va a modificar la página respondiendo cuántos
        caracteres se han introducido en el cuadro de texto.</p>
    <form action="ejercicio1.php" method="post">
        <label for="texto">Introduzca una frase </label><input type="text" name="texto" id="texto" value=<?php if (isset($_POST["texto"])) {
                                                                                                                echo $_POST["texto"];
                                                                                                            } ?>>

        <button type="submit" name="btnContar">Contar</button>
    </form>
    <?php
    if (isset($_POST["btnContar"])) {
        echo "<h1>Respuesta</h1>";
        echo "<p>La longitus del texto introducido es de: " . mi_srtlen($_POST["texto"]) . "</p>";
    }

    ?>
</body>

</html>