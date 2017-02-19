<?php
/**
 * Created by PhpStorm.
 * User: jhonb
 * Date: 12/2/2017
 * Time: 16:02
 */

include "../../models/login.php";


$play = $_REQUEST["f"];
$play = $play();
//Manda al modelo login
function GetPrueba(){
    $db = new login();
    $prueba = $db->prueba();
    $prueba2 = filter_input(INPUT_POST,"prueba");
    $array = array("nombre"=>$prueba2,"cosas"=>$prueba);
    echo json_encode($array);
}

