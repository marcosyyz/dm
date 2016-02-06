<?php
//chamando por ajax
include '../config.php';
include ROOT.'model/Comentario.php';

$retorno = 1;
$noticia_cdg = isset($_GET['n'])  ?  $_GET['n'] : -1; 
$item_cdg = isset($_GET['i'])  ?  $_GET['i'] : -1; 
$texto = isset($_POST['texto_comentario'])  ?  $_POST['texto_comentario'] : ''; 
$usuario = isset($_POST['usuario'])  ?  $_POST['usuario'] : -1; 
$rating = isset($_POST['rating'])  ?  $_POST['rating'] : -1; 



if($texto != ''){
 
    $Comentario = New Comentario();
    try{
        $Comentario->inserir_comentario($texto,$usuario,-1,$noticia_cdg,$item_cdg,$rating);
    } catch (Exception $e) {
        $retorno =  ' Você ja postou uma Avaliação para este item.';
    }
}

echo $retorno;


 //header("Location: ".ROOT_URL."view/post.php?n=".$noticia_cdg);