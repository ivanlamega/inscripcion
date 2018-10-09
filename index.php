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
            <form class="form-container">
                <div class="field-title-a"><strong>Tecnicatura Superior en Infomática Aplicada</strong></div>
                <div class="form-title"><strong>Carrera</strong></div>
                <select class="form-field" name='carrera' required>
                    <option value='' selected disabled hidden>Elija la carrera</option>
                    <?php
                        $listaCarreras = ObtenerCarreras();
                        while($row=$listaCarreras->fetch_object())
                        {
                            print "<option value='$row->idCarrera'>$row->nombre</option>";
                        }
                    ?>
                </select>
                <div class="submit-container">
                <input class="submit-button" type="submit" value="Ingresar" />
                <center><div class="field-title-a"><a href="">Iniciar como Admin</a></div></center>
                </div>
            </form>
        </center>
        <?php
        // put your code here
        ?>
    </body>
</html>
