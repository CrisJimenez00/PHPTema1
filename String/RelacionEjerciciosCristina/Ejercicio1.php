<?php

if (isset($_POST["guardar"])) {
    $error_primera_palabra = $_POST["primePalabra"] == "";
    $error_segunda_palabra = $_POST["segunPalabra"] == "";
    $error_formulario = $error_primera_palabra || $error_segunda_palabra;
}
if (isset($_POST["guardar"]) && !$error_formulario) {
    require "Ejercicio1.php";
} else {
?>
    <DOCTYPE html>
        <html lang="es">

        <head>
            <title>Formulario</title>
            <meta charset="UTF-8" />
        </head>

        <body>
            <table border=1>
                <form method="post" action="Ejercicio1.php" enctype="multipart/form-data">
                    <tr>
                        <th colspan="2">
                            <h2>Ripios - Formulario</h2>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Dime dos palabras y te diré si riman o no</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="primePalabra">Primera palabra: </label>
                        </td>
                        <td>
                            <input type="text" name="primePalabra" id="primePalabra" value="<?php if (isset($_POST["primePalabra"])) echo $_POST["primePalabra"] ?>">

                            <?php
                            if (isset($_POST["primePalabra"]) && $error_primera_palabra) {
                                echo "<span class='error'>*Campo Vacío*</span>";
                            } else if (strlen("primePalabra") < 3 && $error_primera_palabra) {
                                echo "<span class='error'>*Al menos 3 carácteres*</span>";
                            }
                            ?>
                        </td>
                    </tr>

                    <td>
                        <label for="segunPalabra">Segunda palabra:</label>
                    </td>
                    <td>
                        <input type="text" name="segunPalabra" id="segunPalabra" size="40" value="<?php if (isset($_POST["segunPalabra"])) echo $_POST["segunPalabra"] ?>">

                        <?php
                        if (isset($_POST["segunPalabra"]) && $error_segunda_palabra)
                            echo "<span class='error'>*Campo Vacío*</span>";
                        ?>
                    </td>





                </form>
            </table>
            <button type="submit" name="guardar">Guardar cambios</button>
        </body>
    <?php
}
    ?>

        </html>