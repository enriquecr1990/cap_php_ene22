<?php

include_once "BaseDeDatos.php";

/**
 * realizar las operaciones basicas
 * select, insert, update, delete
 */

class ModeloBase extends BaseDeDatos{

    private $tabla;

    function __construct($tabla)
    {
        parent::__construct();
        $this->tabla = $tabla;
    }

    public function obtenerRegistros(){
        $consulta = "select * from ".$this->tabla;
        $registros = $this->queryNativa($consulta);
        return $registros;
    }

}