<?php
include '../../config.php';
include ROOT.'model/SEO.php';

$SEO = New SEO();


$SEO->setTitle('Telefones Prefeitura de Mogi!');

include ROOT.'view/pagina/telefones-prefeitura.php';
