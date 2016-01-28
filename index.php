<?php 
require('retorno_correios.class.php');
$obj= new RetornoCorreio();
$obj->setCodigo('PI287643179BR');
$obj->statusRastreamento();
