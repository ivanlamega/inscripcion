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
            <form class="form-container" method='post' action="inscripcion.php">
                <div class="field-title-a"><strong>Tecnicatura Superior en Infomática Aplicada</strong></div>
                <div class="form-title"><strong>Turno</strong></div>
                <select class="form-field" required>
                    <option value='' selected disabled hidden>Elija el turno</option>
                    <option value="volvo">Noviembre-Diciembre</option>
                </select>
                <div class="field-title-b"><strong>Apellido y nombre</strong></div>
                <input class="form-field" type="text" name="email" required/><br />
                <div class="field-title-b"><strong>DNI</strong></div>
                <input class="form-field" type="text" name="email" required/><br />
                <div class="field-title-b"><strong>Curso</strong></div>
                <input class="form-field" type="text" name="email" required/><br />
                <div class="field-title-b"><strong>Fecha</strong></div>
                <input class="form-field" type="date" name="email" required/><br />
                <table border="1">
                    <tr>
                        <th>Año</th>
                        <th>Asignatura</th>
                        <th>1º Llamado</th> 
                        <th>2º Llamado</th>
                    </tr>
                    <tr>
                        <td><strong>1º</strong></td>
                        <td><strong>Introduccion a los procesos y sistemas</strong></td>
                        <td><input type="checkbox" name="vehicle2" value="Car"></td>
                        <td><input type="checkbox" name="vehicle3" value="Boat"></td>
                    </tr>
                </table>
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
