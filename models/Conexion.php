<?php
/**
 * Created by PhpStorm.
 * User: jhonb
 * Date: 11/2/2017
 * Time: 23:16
 */
class Conexion extends PDO
{
    private $tipo_de_base    = 'mysql';         //O la que sea
    private $host            = 'localhost';     //Localhost o tu ip de la base de datos
    private $nombre_de_base = 'pruebas';        //El nombre de tu BD, obviamente ;)
    private $usuario         = 'root';          //Tu usuario
    private $contrasena      = 'espartaco3';    //Contraseña


    /**
     * pista 1: crea la conexión PDO.
     */
    public function __CONSTRUCT() {

        try{

            parent::__CONSTRUCT($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);

        }catch(PDOException $e){
            echo 'Error de conexión con la base de datos. Pásale esta info al encargado del sistema: ' . $e->getMessage();
            exit;
        }
    }
    /*
     * Pista 2: Si no pasas un parámetro $tipoFetch te devuelve un rowCount
     */

    function ejecutar($query, $tipoFetch){
        $fetch = 0;
        switch ($tipoFetch){
            case 1:
                $fetch = PDO::FETCH_ASSOC;
                break;
            case 2:
                $fetch = PDO::FETCH_COLUMN;
                break;
            default:
                $fetch = null;
                break;
        }
        try{
            $sql = $this->prepare($query);
            $msg = $query;
            if(!$sql->execute()){
                print_r($this->errorInfo());
                throw new Exception("Error : ".$query."---");
            }
        }catch (PDOException $e){
            $msg = date("Y-m-d H:i:s")." ---ERROR: ". $e->getMessage()."\n".$this->errorInfo()."\n";
        }
        $this->logs($msg);
        if(!is_null($fetch)){
            $sql = $sql->fetchAll($fetch);
        }
        else{
            $sql= $sql->rowCount();
        }
        return $sql;
    }

    public function logs($msg){
        $url = "../../logs/".date("Y-m-d").".log";
        $fp = fopen ($url,"a");
        $texto= date("Y-m-d H:i:s")."-->".$msg."\n";
        fwrite ($fp, $texto);
        fclose($fp);
    }
}
