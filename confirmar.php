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
            
            $idCarrera = 0;
            if(isset($_POST["carrera"]))
            {
                $idCarrera = $_POST["carrera"];
            }
        ?>
    </head>
    <body>
        
        <center>
            <div class='my-notification' ><strong class='uppercase' id='alertHeader'>I.S.P. Las Toscas</strong><a href='#' class='close-my-notification'>x</a><p>Inscripción a mesas de examen</p></div>
            <form class="form-container" method='post' action="index.php">
                <div class="field-title-a"><strong>Su inscripción se ha realizado correctamente</strong></div>
                <div class="submit-container">
                <input class="submit-button" type="submit" value="Terminar" />
                </div>
            </form>
        </center>
        <?php
            print "hola".$idCarrera;
            $asignaturas = ObtenerAsignaturas($idCarrera);
            while($row=$asignaturas->fetch_object())
            {
                print $row->idAsignatura;
                print "hola";
            }
            print "hola";
        ?>
    </body>
</html>
