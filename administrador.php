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
            
            $usuario = 0;
            $contra = 0;
            $idAlumno = 0;
            
            if(isset($_POST["usuario"]) && isset($_POST["contra"]))
            {
                $usuario = $_POST["usuario"];
                $contra = $_POST["contra"];
                $contraBd = BuscarAdmin($usuario);
                
                
                if($contraBd != false)
                {
                    if(strcmp($contra, $contraBd) != 0)
                    {
                        header("Location:iniciar_sesion.php");
                    }
                }
                else
                {
                    header("Location:iniciar_sesion.php");
                }
                
            }
            else
            {
                 header("Location:iniciar_sesion.php");
            }
            
            if(isset($_POST["alumno"]))
            {
                $idAlumno = $_POST["alumno"];
            }
        ?>
    </head>
    <body>
        <center>
            <div class='my-notification' ><strong class='uppercase' id='alertHeader'>I.S.P. Las Toscas</strong><a href='#' class='close-my-notification'>x</a><p>Bienvenido administrador</p></div>
            <form class="form-container" method='post' action="administrador.php">
                <div class="field-title-a"><strong>Elija al alumno que desea ver</strong></div><br>
                <?php
                    print "<input type='hidden' name='usuario' value='$usuario'>";
                    print "<input type='hidden' name='contra' value='$contra'>";
                ?>
                <select class="form-field" name='alumno' required>
                    <option value='' selected disabled hidden>Elija el alumno</option>
                    <?php
                        $listaAlumnos = ObtenerAlumnos();
                        while($row=$listaAlumnos->fetch_object())
                        {
                            print "<option value='$row->idAlumno'>$row->NombreApellido</option>";
                        }
                    ?>
                </select>
                
                <div class="submit-container">
                <input class="submit-button" type="submit" value="Ver Alumno" />
                </div>
            </form>
        </center>
        <?php
            if($idAlumno > 0)
            {
                $alumno = ObtenerAlumno($idAlumno)->fetch_object();
                $carrera = ObtenerCarrera($alumno->idCarrera)->fetch_object();
                
                print "<h3>Alumno: $alumno->NombreApellido</h3>";
                print "<h3>Dni: $alumno->DNI</h3>";
                print "<h3>Carrera: $carrera->nombre</h3>";
                print "<h3>Curso: $alumno->Curso to</h3>";
                print "<h3>Fecha: $alumno->fecha</h3>";
                
                
                print "<table border='1'>";
                print "<tr>";
                print "<th>Curso</th>";
                print "<th>Asignatura</th>"; 
                print "<th>1º Llamado</th>";
                print "<th>2º Llamado</th>";
                print "</tr>";
                $inscripcion = InfomacionInscripcion($idAlumno);
                $cantAsignaturas = 0;
                while($row=$inscripcion->fetch_object())
                {
                    print "<tr>";
                    print "<td>$row->grado</td>";
                    print "<td>$row->nombre</td>"; 
                    if($row->llamado1 == 1)
                    {
                        print "<td>Si</td>";
                    }
                    else
                    {
                        print "<td>No</td>";
                    }
                    
                    if($row->llamado2 == 1)
                    {
                        print "<td>Si</td>";
                    }
                    else
                    {
                        print "<td>No</td>";
                    }
                    print "</tr>";
                    
                    $cantAsignaturas++;
                }
                print "</table>";
                
                print "<h3>Total inscriptas: $cantAsignaturas</h3>";
            }
        ?>
    </body>
</html>
