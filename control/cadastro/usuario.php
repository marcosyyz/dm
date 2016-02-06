<?php
include '../../config.php';
include ROOT.'model/Usuario.php';
include ROOT.'model/SEO.php';


$Usuario = New Usuario();

$SEO = New SEO();

$SEO->setTitle('Cadastre-se - Diretório Mogi ');



include ROOT.'view/cadastro/usuario.php';
