<?php

//Array indexado PHP a JSON 
$arrayIndexado = array("Jorge","Luis","Migue","Thomas");
$jsonIndexado = json_encode($arrayIndexado);

echo $jsonIndexado;


//Array asociativo PHP a JSON
$arrayAsociativo = array("nombre" => "Jorge", "edad" => 23);
$jsonAsociativo = json_encode($arrayAsociativo);
echo $jsonAsociativo;


//Clases /Objeto PHP a JSON
$clase = new stdClass();
$clase->_nombre = "Jose";
$clase->_edad = 23;

$json_Objeto = json_encode($clase);

echo $json_Objeto;
 


//JSON a PHP
$json_obj = '{"nombre": "Jose , "edad": 37}';
$obj = json_decode($json_obj);

var_dump($obj);