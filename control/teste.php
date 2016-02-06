<?php 
include '../config.php';
include ROOT.'model/Mapa.php';

$map = New Mapa();
$map->gerar_markersdata('',-1,-1,true);