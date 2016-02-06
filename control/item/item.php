<?php
include '../../config.php';
include ROOT.'model/Item.php';
include ROOT.'model/Comentario.php';
include ROOT.'model/Curtida.php';
include ROOT.'model/SEO.php';

//carregar parametros do item
$item_cdg = isset($_GET['i']) ? $_GET['i'] : '-1';
$item_cdg = $item_cdg == '' ? -1 : $item_cdg ;
$item_cdg = !is_numeric($item_cdg) ? -1 : $item_cdg ;

$item_url = isset($_GET['url']) ? $_GET['url'] : '-1';
$item_url = $item_url == '' ? '-1' : $item_url ;
    
if((is_numeric($item_cdg)) || ($item_url != '-1')){
 
    //carregar classes
    $Comentario = New Comentario();
    $Item = New Item($item_cdg,$item_url); //criar item antes da curtida para ter o item_Cdg atualizado
    $Curtida = New Curtida($Item->item_cdg,-1,1);    
    $SEO = New SEO();

    //carregar colecoes
    $comentarios = $Comentario->lista_comentarios_item($Item->item_cdg);
    $total_comentarios =  $Comentario->total_atual;
    $Item->adicionar_contador();

    //carregar textos para SEO
    $SEO->setTitle($Item->nome.' em Mogi das Cruzes - Diretório Mogi ');
    $SEO->setDescription('Saiba como chegar em '.$Item->nome.' em Mogi das Cruzes, veja o contato, endereço e rotas. Encontre tudo sobre '.$Item->categoria_nome.'.');
    if(trim($Item->imagem) != '')
        $SEO->setImage($Item->imagem);

    $posicao_botoes = ''; //css botoes sociais
    $identificador = 'item';
}

//se nao teve parametros, ou nao conseguiu carregar o Item
$erro =  (($item_cdg == '-1') && ($item_url == '-1')) || (!isset($Item)) ;



    

if(($Item->carregado) && (!$erro)){
    require ROOT.'view/item/item.php';
}else{
    $SEO = New SEO();
    require ROOT.'view/item/item-nao-encontrado.php';
}


