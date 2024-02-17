<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
//require_once('../models/Usuarios_Roles.models.php');
class Sucursales
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * from sucursales;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($SucursalId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM sucursales WHERE sucursales.SucursalId = $SucursalId;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Nombre, $Direccion, $Telefono, $Correo, $Parroquia, $Canton, $Provincia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `sucursales`(`Nombre`, `Direccion`, `Telefono`, `Correo`, `Parroquia`, `Canton`, `Provincia`) VALUES('$Nombre','$Direccion','$Telefono','$Correo','$Parroquia','$Canton','$Provincia')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
        }
        $con->close();
    }

    /*TODO: Procedimiento para actualizar 
    public function Actualizar($SucursalId, $Nombre, $Direccion, $Telefono, $Correo, $Parroquia, $Canton, $Provincia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update sucursales set Nombre='$Nombre',Direccion='$Direccion',Telefono='$Telefono',Correo='$Correo',Parroquia=$Parroquia, Canton=$Canton, Provincia=$Provincia where SucursalId= $SucursalId";
        if (mysqli_query($con, $cadena)) {
            return ($SucursalId);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar 
    public function Eliminar($SucursalId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Sucursales where SucursalId = $SucursalId";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }*/

}
