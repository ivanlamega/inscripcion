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
            
            $turno = 0;
            $nombApel = 0;
            $dni = 0;
            $curso = 0;
            $fecha = 0;
            
            if(isset($_POST["turno"]) && isset($_POST["nomApe"]) && isset($_POST["dni"]) && isset($_POST["curso"]) && isset($_POST["fecha"]))
            {
                $turno = $_POST["turno"];
                $nombApel = $_POST["nomApe"];
                $dni = $_POST["dni"];
                $curso = $_POST["curso"];
                $fecha = $_POST["fecha"];
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
            
            $idAlumno = InsertarAlumno($nombApel, $dni, $curso, $fecha, $idCarrera);
        
            $asignaturas = ObtenerAsignaturas($idCarrera);
            while($row=$asignaturas->fetch_object())
            {
                $primerLlamado = 0;
                $segundoLlamado = 0;
                
                if(isset($_POST["llamado1".$row->idAsignatura]))
                {
                    //print "$row->nombre: primer llamado<br>";
                    $primerLlamado = $_POST["llamado1".$row->idAsignatura];
                }
                
                if(isset($_POST["llamado2".$row->idAsignatura]))
                {
                    //print "$row->nombre: segundo llamado<br>";
                    $segundoLlamado = $_POST["llamado2".$row->idAsignatura];
                }
                
                if($primerLlamado == 0 && $segundoLlamado == 0)
                {
                    continue;
                }
                
                InscribirAlumno($idAlumno, $row->idAsignatura, $primerLlamado, $segundoLlamado, $turno);
            }
        ?>
    </body>
</html>
