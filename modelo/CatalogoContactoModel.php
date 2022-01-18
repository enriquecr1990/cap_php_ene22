<?php
include 'BaseDeDatos.php';

$bd = new BaseDeDatos();
$registros = $bd->obtenerRegistros("select * from catalogo_contacto");
var_dump($registros);
$empleados = $bd->obtenerRegistros("select * from empleado");
var_dump($empleados);

/**
 * crear clase correspondiente y hacer herencia de la clase BaseDeDatos
 */

exit;