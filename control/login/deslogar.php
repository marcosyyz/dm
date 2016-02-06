<?php
include '../../config.php';
include_once ROOT.'model/Login.php'; 

if(!isset($Login))
    $Login = New Login ();

$Login->deslogar_BD($_SESSION['USUARIO_CDG']);


unset($_SESSION['USUARIO_CDG']);
unset($_SESSION['IDSOCIAL']);
unset($_SESSION['USUARIO_IMAGEM']);
unset($_SESSION['LOGIN']);
unset($_SESSION['SENHA']);
unset($_SESSION['USUARIO_NOME']);
unset($_SESSION['USUARIO_TIPO']); 
unset($_SESSION['USUARIO_ATIVO']);   
unset($_SESSION['LOGADO']);
unset($_SESSION['state']);
unset($_SESSION['access_token']); 


 header("Location: ".ROOT_URL);
