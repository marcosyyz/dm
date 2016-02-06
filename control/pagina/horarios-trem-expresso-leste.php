<?php
include '../../config.php';
include ROOT.'model/SEO.php';

$SEO = New SEO();

$SEO->setTitle('Horários do trem Expresso Leste Mogi das Cruzes - Luz');
$SEO->setDescription('Confira os horários do Expresso Leste Mogi das Cruzes - Luz. Veja o funcionamento e status online do metro e trem e formas de contatos');





include ROOT.'view/pagina/horarios-trem-expresso-leste.php';