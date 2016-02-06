<?php
include '../../config.php';
include ROOT.'model/Noticia.php';
include ROOT.'model/SEO.php';

$filtro_noticia  = isset($_POST['filtro_busca']) ? $_POST['filtro_busca'] : '';


$Noticia = New Noticia();
$noticias = $Noticia->lista_noticias($filtro_noticia,' LIMIT 5');
$SEO = New SEO();

$SEO->setTitle('Notícias de Mogi das Cruzes e região - SP - Diretório Mogi ');
$SEO->setDescription('As melhores e mais importantes notícias sobre Mogi das Cruzes e região, fique por dentro dos Esportes, Eventos, Baladas, Restaurantes, teatro e muito mais.');

$total_pages = 10;



include ROOT.'view/noticia/noticias.php';

