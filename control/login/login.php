<?php
include '../../config.php';
include ROOT.'model/SEO.php';

$SEO = New SEO();
$SEO->setTitle('Cadastre-se - Diretório Mogi ');

$status = isset($_GET['s']) ? $_GET['s'] : -1 ;

include ROOT.'view/login/login.php';







