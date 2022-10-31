<?php
if (isset($_POST["btnEnviar"])) {
    $error_texto = $_FILES["texto"]["name"] != "" && ($_FILES["texto"]["error"]
        || $_FILES["texto"]["type"] != "text/plain" || $_FILES["texto"]["size"] > (1000000));
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Ejercicio 2</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <p>Realizar una página php con nombre ejercicio2.php, que te permita subir
        un fichero txt no más grande de 1MB.
        Si el fichero es subido con éxito, será movido con el nombre de
        “archivo.txt” a una carpeta llamada “Ficheros”.
        Informar de los posibles errores y cuándo no los haya, del resultado de la
        operación ( Archivo subido o no con Éxito)</p>
    <form action="ejercicio2.php" method="post" enctype="multipart/form-data">
        <input type="file" accept="texto/*" id="texto" name="texto" />
        <?php
        if (isset($_POST["btnEnviar"]) && $error_texto) {

            if ($_FILES["texto"]["error"]) {

                echo "*Error en la subida de la texto al servidor*";
            } else if ($_FILES["texto"]["type"] != "text/plain") {

                echo "*No has seleccionado un archivo texto*";
            } else {

                echo "*el tamaño del archivo seleccionado es mayor de 1000000KB*";
            }
        }
        if (isset($_POST["btnEnviar"]) && !$error_texto) {
            @$var = move_uploaded_file($_FILES["texto"]["tmp_name"], "texto/".$_FILES["texto"]["name"]);
            echo "*Se ha subido con éxito*";
        }
        ?>
        <button type="submit" name="btnEnviar">Enviar</button>
</body>

</html>