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
            <form class="form-container" method='post' action="confirmar.php">
                <?php
                    $carrera = ObtenerCarrera($idCarrera)->fetch_object();
                    $turnos = ObtenerTurnos();
                    
                    print "<div class='field-title-a'><strong>$carrera->nombre</strong></div>";
                    print "<input type='hidden' name='carrera' value='$idCarrera'>";
                    print "<div class='form-title'><strong>Turno</strong></div>";
                    print "<select name='turno' class='form-field' required>";
                    print "<option value='' selected disabled hidden>Elija el turno</option>";
                    while($row=$turnos->fetch_object())
                    {
                        print "<option value='$row->idTurno'>$row->turno</option>";
                    }
                    print "</select>";
                ?>
                <div class="field-title-b"><strong>Apellido y nombre</strong></div>
                <input class="form-field" type="text" name="nomApe" required/><br />
                <div class="field-title-b"><strong>DNI</strong></div>
                <input class="form-field" type="text" name="dni" required/><br />
                <div class="field-title-b"><strong>Curso</strong></div>
                <input class="form-field" type="number" name="curso" required/><br />
                <div class="field-title-b"><strong>Fecha</strong></div>
                <input class="form-field" type="date" name="fecha" required/><br />
                
                <table border="1">
                    <tr>
                        <th>Año</th>
                        <th>Asignatura</th>
                        <th>1º Llamado</th> 
                        <th>2º Llamado</th>
                    </tr>
                    
                    <?php
                        $asignaturas = ObtenerAsignaturas($idCarrera);
                        while($row=$asignaturas->fetch_object())
                        {
                            print "<tr>";
                            print "<td><strong>$row->grado º</strong></td>";
                            print "<td><strong>$row->nombre</strong></td>";
                            print "<td><input type='checkbox' name='llamado1$row->idAsignatura' value='1'></td>";
                            print "<td><input type='checkbox' name='llamado2$row->idAsignatura' value='1'></td>";
                            print "</tr>";
                        }
                    ?>
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
