<?php

//1.- consumir el modelo
include_once "../modelo/EmpleadoModel.php";
include_once "../modelo/ContactoModel.php";

class EmpleadosController {

    /**
     * operaciones necesarias para poder manipular el sistema
     * obtener registros
     * insertar registrsos
     * actualizar
     * eliminar
     */
    public function obtenerEmpleados(){
        try{
            $empleadoModel = new EmpleadoModel();
            $registrosEmpleado = $empleadoModel->obtenerRegistros();
            $respuesta = array(
                'success' => true,
                'data' => array(
                    'empleados' => $registrosEmpleado
                )
            );
            return $respuesta;
        }catch (Exception $ex){
            $respuesta = array(
                'success' => false,
                'msg' => array(
                    utf8_encode('Ocurrio un error en el servidor, intentar más tarde'),
                    $ex->getMessage()
                )
            );
            return $respuesta;
        }
    }



}