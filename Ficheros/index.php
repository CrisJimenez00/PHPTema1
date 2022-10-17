<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ficheros de Texto</h1>
    <?php
    $fd = fopen("prueba.txt", "r");
    if(!$fd){
        //Se usa cuando queremos parar una ejecución y mostrar un mensaje
        die("<p>No se ha podido abrir el fichero <em>prueba.txt</em></p>");
    }

    //Siempre hay que cerrar la lectura de los ficheros(se llama a la variable que lo abre)
    fclose($fd);
    ?>
</body>

</html>