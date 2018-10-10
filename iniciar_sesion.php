<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilos/inscripcion.css">
        <?php
            include("BD/conexionBD.php");
        ?>
    </head>
    <body>
        <center>
            <div class='my-notification' ><strong class='uppercase' id='alertHeader'>I.S.P. Las Toscas</strong><a href='#' class='close-my-notification'>x</a><p>Inscripción a mesas de examen</p></div>
            <form class="form-container" method='post' action="administrador.php">
                <div class="field-title-a"><strong>Iniciar sesión como admin</strong></div><br>
                <div class="field-title-b"><strong>Usuario</strong></div>
                <input class="form-field" type="text" name="usuario" required/><br />
                <div class="field-title-b"><strong>Contraseña</strong></div>
                <input class="form-field" type="password" name="contra" required/><br />
                
                <div class="submit-container">
                <input class="submit-button" type="submit" value="Inscribirse" />
                </div>
            </form>
        </center>
        <?php
        // put your code here
        ?>
    </body>
</html>
