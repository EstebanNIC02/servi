<?php
function autoload($class){
    require_once($class.".php");
    //per,mite controlar la carga del web service
}
spl_autoload_register("autoload");
//esta es una funcion que permite ehecutar el autoload 
//permite cargar clases en una sola funcion


?>