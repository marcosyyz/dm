<?php
include '../../config.php';
include ROOT.'model/SEO.php';
include ROOT.'model/Usuario.php';

$SEO = New SEO();
$SEO->setTitle('Alterar dados do perfil - Diretório Mogi ');
  
$status = isset($_GET['s']) ? $_GET['s'] : 0 ;
$status_up = isset($_GET['f']) ? $_GET['f'] : 0 ;


$Usuario = New Usuario($_SESSION['USUARIO_CDG']);


include ROOT.'view/cadastro/editar_perfil.php';

