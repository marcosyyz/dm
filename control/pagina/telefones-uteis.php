<?php
include '../../config.php';
include ROOT.'model/SEO.php';

$SEO = New SEO();


$SEO->setTitle('Telefones Úteis em Mogi das Cruzes');

include ROOT.'view/pagina/telefones-uteis.php';
