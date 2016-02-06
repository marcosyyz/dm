<?php
//chamando por ajax
include '../config.php';
include ROOT.'model/Curtida.php';


$tipo = isset($_POST['tipo'])  ?  $_POST['tipo'] : null; // -1 igual a 'nao curti'
$item = isset($_POST['item'])  ?  $_POST['item'] : -1; 
$noticia = isset($_POST['noticia'])  ?  $_POST['noticia'] : -1; 
$usuario = isset($_POST['usuario'])  ?  $_POST['usuario'] : -1; // -1 igual a 'nao curti'

$Curtida = New Curtida($item,$noticia, $usuario);

try{
    $retorno = $Curtida->enviar_curtida($tipo);
} catch (Exception $e) {
     $retorno =  ' Você ja Curtiu este item.';
     $retorno = $e->getMessage();
}


echo $retorno;
