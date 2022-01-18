<?php

include 'ConfigBD.php';

/*
 * consultas
 * nuevos registros
 * modificar registros
 * eliminar registros
 * CRUD
 */

class BaseDeDatos{

    private $dbConfig;
    private $mysqli;

    function __construct()
    {
        //manejo de errores
        try{
            $this->dbConfig = ConfigBD::getConfig();
            $this->mysqli = new mysqli(
                $this->dbConfig['host'],
                $this->dbConfig['user'],
                $this->dbConfig['password'],
                $this->dbConfig['database'],
                $this->dbConfig['port']
            );
            if($this->mysqli->connect_errno){
                echo "Error en la conexion de BD ".$this->mysqli->connect_error;
            }
        }catch (Exception $ex){
            //mostrar mensaje de error de constructor de BaseDeDatos
            echo 'Error en el constructor de BaseDeDatos';die;
        }
    }

    public function obtenerRegistros($consulta){
        $consulta = $this->mysqli->query($consulta);
        $indexRegistro = 0;
        $array_registros = array();
        while ($registro = $consulta->fetch_assoc()){
            foreach ($registro as $columna => $valor){
                $array_registros[$indexRegistro][$columna] = $valor;
            }
            $indexRegistro++;
        }
        return $array_registros;
    }

    public function getCatalogoContacto(){
        $consulta = $this->mysqli->query("select * from catalogo_contacto");
        $indexRegistro = 0;
        $array_registros = array();
        while ($registro = $consulta->fetch_assoc()){
            foreach ($registro as $columna => $valor){
                $array_registros[$indexRegistro][$columna] = $valor;
            }
            $indexRegistro++;
        }
        return $array_registros;
    }

}

/*$configDB = ConfigBD::getConfig();
$conexion = new mysqli(
    $configDB['host'],$configDB['user'],$configDB['password'],$configDB['database'],$configDB['port']
);

//$update = $conexion->query("UPDATE catalogo_contacto SET tipo = 'Redes sociales' WHERE id=3");
//$delete = $conexion->query("DELETE FROM catalogo_contacto WHERE id=4");
$insert = $conexion->query("INSERT INTO catalogo_contacto(tipo) values ('Nuevo cat')");
$consulta = $conexion->query("select * from catalogo_contacto");

$indexRegistro = 0;
$array_registros = array();
while ($registro = $consulta->fetch_assoc()){
    foreach ($registro as $columna => $valor){
        $array_registros[$indexRegistro][$columna] = $valor;
    }
    $indexRegistro++;
}

var_dump($array_registros);
*/
