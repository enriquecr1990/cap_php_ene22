<?php

//1.- consumir el modelo
include_once "../modelo/EmpleadoModel.php";
include_once "../modelo/ContactoModel.php";
include_once "../helper/ValidacionFormulario.php";

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
            //funcionalidad de obtener los datos de contacto por cada empleado
            $empleadoCompleto = array();
            foreach ($registrosEmpleado as $index => $empleado){
                $contactoModel = new ContactoModel($empleado['id']);
                $registroContactoEmpleado = $contactoModel->obtenerRegistros();
                $empleado['datos_contacto'] = $registroContactoEmpleado;
                $empleadoCompleto[$index] = $empleado;
            }
            //var_dump($empleadoCompleto);exit;
            $respuesta = array(
                'success' => true,
                'data' => array(
                    'empleados' => $empleadoCompleto
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

    //reciba el array de datos del empleado
    //van a llegar desde el post
    //vamos a validar si es un guardar nuevo o actualizar
    public function guardarEmpleado($datosFormulario){
        try{
            //validar datos del formulario
            $validacion = ValidacionFormulario::validarFormEmpleado($datosFormulario);
            if($validacion['status']){
                //actualizar empleado
                if(isset($datosFormulario['id']) && $datosFormulario['id'] != '' && $datosFormulario['id'] != 0){
                    $empleadoModel = new EmpleadoModel();
                    $guardar = $empleadoModel->actualizar($datosFormulario,array('id' => $datosFormulario['id']));
                    if($guardar){
                        $respuesta = array(
                            'success' => true,
                            'msg' => array(
                                'Se actualizo el empleado correctamente'
                            )
                        );
                    }else{
                        $respuesta = array(
                            'success' => false,
                            'msg' => array(
                                'No fue posible actualizar el empleado correctamente'
                            )
                        );
                    }
                }else{
                    //agregar nuevo empleado
                    $empleadoModel = new EmpleadoModel();
                    //como en el nuevo registro no necesita el id
                    //unset($datosFormulario['id']);
                    $datosFormulario['id'] = 0;
                    $idNuevo = $empleadoModel->insertar($datosFormulario);
                    if(is_numeric($idNuevo)){
                        $respuesta = array(
                            'success' => true,
                            'data' => array(
                                'id_empleado' => $idNuevo
                            ),
                            'msg' => array(
                                'Se registro el empleado correctamente'
                            )
                        );
                    }else{
                        $respuesta = array(
                            'success' => false,
                            'msg' => array(
                                'No fue posible agregar el empleado correctamente'
                            )
                        );
                    }
                }
            }else{
                $respuesta['success'] = false;
                $respuesta['msg'] = $validacion['msg'];
            }
        }catch (Exception $ex){
            $respuesta = array(
                'success' => false,
                'msg' => array(
                    utf8_encode('Ocurrio un error en el servidor, intentar más tarde'),
                    $ex->getMessage()
                )
            );
        }
        return $respuesta;
    }

}