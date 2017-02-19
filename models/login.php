<?php
/**
 * Created by PhpStorm.
 * User: jhonb
 * Date: 12/2/2017
 * Time: 16:44
 */

include "Conexion.php";
class login{
    private $conn;
    function __construct()
    {
        $this->conn = new Conexion();
    }
    /*
     * pista3: 1 es assoc y 2 es column ;)
     */
    function prueba(){

        $prueba = $this->conn->ejecutar("SELECT *FROM productos",1);
        return $prueba;
    }


}



