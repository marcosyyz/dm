<?php
include '../../config.php';
include ROOT.'model/SEO.php';

$SEO = New SEO();


$SEO->setTitle('Entre em contato conosco!');

include ROOT.'view/pagina/contato.php';