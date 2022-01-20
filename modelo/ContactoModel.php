<?php

include_once "ModeloBase.php";

class ContactoModel extends ModeloBase{

    private $idEmpleado;

    public function __construct($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
        parent::__construct("contacto");
    }

    public function obtenerRegistros()
    {
        $consulta = "select * from contacto where empleado_id = ".$this->idEmpleado;
        $registros = $this->consultaRegistros($consulta);
        return $registros;
    }

}
