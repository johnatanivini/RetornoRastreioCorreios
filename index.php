<?php 
/**
* Class de retorno dos correios 
* Trás o status do pedido
*/
require('retorno_correios.class.php');
$obj= new RetornoCorreio();
$obj->setCodigo('PI287643179BR');
$obj->statusRastreamento();
