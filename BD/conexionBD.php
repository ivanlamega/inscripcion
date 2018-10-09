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
    $consultaSQL = "SELECT * FROM asignaturas WHERE idCarrera = $idCarrera";
    
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
?>