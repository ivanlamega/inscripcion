<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function conectar()
{
    //                    (host,   usuario, pass, nombreBase)
    $conexion = new mysqli('localhost','root','','examenes');
     $acentos = $conexion->query("SET NAMES 'utf8'");
    return $conexion;
}

function EjecutarConsulta($consultaSQL)
{
    //                    (host,   usuario, pass, nombreBase)
    $conexion = conectar();
    $resultado = $conexion->query($consultaSQL);
    /*el if pregunta si la conexion no pudo ejecutar la consulta*/


    if (!$resultado)
    {
        print "NO SE PUDO CONECTAR A LA BASE DE DATOS";
    }
    else
    {
        return $resultado;
    }

}

function ObtenerCarreras()
{
    $consultaSQL = "SELECT * FROM carreras";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}

function ObtenerCarrera($idCarrera)
{
    $consultaSQL = "SELECT * FROM carreras WHERE idCarrera = $idCarrera";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}

function ObtenerAsignaturas($idCarrera)
{
    $consultaSQL = "SELECT * FROM asignaturas WHERE idCarrera = $idCarrera  ORDER BY grado";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}

function ObtenerTurnos()
{
    
    $consultaSQL = "SELECT * FROM turnos";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}


function InscribirAlumno($idAlumno, $idAsignatura, $llamado1, $llamado2, $idTurno)
{
    
    $consultaSQL = "INSERT INTO inscripcion (idAlumno, idAsignatura, llamado1, llamado2, idTurno) VALUES ('$idAlumno', '$idAsignatura', '$llamado1', '$llamado2', '$idTurno');";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}

function InsertarAlumno($nombre, $dni, $curso, $fecha, $idCarrera)
{
    $conexion = conectar();
    
    if($conexion->query("INSERT INTO alumno (NombreApellido, DNI, Curso, fecha, idCarrera) VALUES ('$nombre', '$dni', '$curso', '$fecha', '$idCarrera')") === TRUE)
    {
        $UlcId = $conexion->insert_id;
        return $UlcId;
    }
    else
    {
        echo "Error: " . $consultaSQL . "<br>" . $conexion->error;
    }
    
    $conexion->close();
}

function BuscarAdmin($usuario)
{
    
    $consultaSQL="SELECT * FROM administrador WHERE usuario = '$usuario'";
    $resultado = EjecutarConsulta($consultaSQL);

    if (isset($resultado))
    {
        //VERIFICO SI ENCONTRO DATOS
        $fila = $resultado->fetch_object();
        if (isset($fila->contra))
        {
            return $fila->contra;    
        }
        else 
        {     return false;
        
        }
    }
}

function ObtenerAlumnos()
{
    
    $consultaSQL = "SELECT * FROM alumno";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}


function ObtenerAlumno($idAlumno)
{
    
    $consultaSQL = "SELECT * FROM alumno WHERE idAlumno = $idAlumno";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}

function InfomacionInscripcion($idAlumno)
{
    
    $consultaSQL = "SELECT inscripcion.*, asignaturas.grado, asignaturas.nombre FROM inscripcion JOIN asignaturas ON asignaturas.idAsignatura = inscripcion.idAsignatura WHERE idAlumno = $idAlumno";
    
    $resultado=  EjecutarConsulta($consultaSQL);
    if (isset($resultado))
    {

        return $resultado;    
    }
    else 
    {
        return false;
    }
}
?>