<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/sucursales.models.php");
//require_once("../models/Accesos.models.php");
$Sucursales = new Sucursales;
//$Accesos = new Accesos;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Sucursales->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $SucursalId = $_POST["SucursalId"];
        $datos = array();
        $datos = $Sucursales->uno($SucursalId);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Correo = $_POST["Correo"];
        $Parroquia = $_POST["Parroquia"];
        $Canton = $_POST["Canton"];
        $Provincia = $_POST["Provincia"];
        $SucursalId = $_POST["SucursalId"];
        $datos = array();
        $datos = $Sucursales->Insertar($Nombre, $Direccion, $Telefono, $Correo, $Parroquia, $Canton, $Provincia, $SucursalId);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar 
    case 'actualizar':
        $Nombre = $_POST["Nombre"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Correo = $_POST["Correo"];
        $Parroquia = $_POST["Parroquia"];
        $Canton = $_POST["Canton"];
        $Provincia = $_POST["Provincia"];
        $SucursalId = $_POST["SucursalId"];
        $datos = array();
        $datos = $Sucursales->Actualizar($SucursalId, $Nombre, $Direccion, $Telefono, $Correo, $Parroquia, $Canton, $Provincia);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar 
    case 'eliminar':
        $SucursalId = $_POST["SucursalId"];
        $datos = array();
        $datos = $Sucursales->Eliminar($SucursalId);
        echo json_encode($datos);
        break;
        TODO: Procedimiento para insertar */
    
}
