<?php
include '../../config.php';
include ROOT.'model/Noticia.php';
include ROOT.'model/SEO.php';
include ROOT.'model/Comentario.php';
include ROOT.'model/Curtida.php';
include ROOT.'model/Ranking.php';


//carregar parametros da noticia
$noticia_cdg = isset($_GET['n'])  ?  $_GET['n'] : -1; 
$noticia_cdg = $noticia_cdg == '' ? -1 : $noticia_cdg ;
$noticia_cdg = !is_numeric($noticia_cdg) ? -1 : $noticia_cdg ;

$noticia_url = isset($_GET['n_url']) ? $_GET['n_url'] : '-1';
$noticia_url = $noticia_url == '' ? '-1' : $noticia_url ;


if((is_numeric($noticia_cdg)) || ($noticia_url != '-1')){

    //carregar classes
    
    $Noticia = New Noticia($noticia_cdg,$noticia_url);
    //echo $Noticia->noticia_cdg;    
    $Curtida = New Curtida(-1,$Noticia->noticia_cdg,1);
    $Comentario = New Comentario($Noticia->noticia_cdg);
    $SEO = New SEO();
    $Ranking = New Ranking();

    //carregar colecoes
    $Noticia->adicionar_view();
    $comentarios = $Comentario->lista_comentarios_noticia($Noticia->noticia_cdg);
    $ranking =  $Ranking->lista_ranking_usuarios();
    $noticias_relacionadas = $Noticia->lista_noticias_relacionadas($Noticia->tags,5);
 //carregar textos para SEO
    $SEO->setTitle($Noticia->titulo.' - Notícias Diretório Mogi ');
    $SEO->setDescription($Noticia->resumo); // ta indo 200 letras
    $SEO->setUrl('http://'.$_SERVER ['SERVER_NAME'].$_SERVER ['REQUEST_URI']);
    if(trim($Noticia->imagem) != '')
        $SEO->setImage($Noticia->imagem);
    
    //css botoes sociais
    $posicao_botoes = 'centro'; 
    $identificador  = 'noticia';
    
    //imagem principal da noticia
    $imagem_caminho_completo = $Noticia->montar_link_imagem();

}

//se nao teve parametros, ou nao conseguiu carregar a noticia
$erro =  (($noticia_cdg == '-1') && ($noticia_url == '-1')) || (!isset($Noticia)) ;

if($erro){
    $SEO = New SEO();
    header('HTTP/1.0 404 Not Found');
    require ROOT.'view/404.php';
    exit;
}

if($Noticia->carregado){
    include ROOT.'view/noticia/post.php';
}else{
    require ROOT.'view/item/item-nao-encontrado.php';
}








