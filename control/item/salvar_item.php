<?php

function criar_slug($string, $slug = false) {
  $string = strtolower($string);
  // Código ASCII das vogais
  $ascii['a'] = range(224, 230);
  $ascii['e'] = range(232, 235);
  $ascii['i'] = range(236, 239);
  $ascii['o'] = array_merge(range(242, 246), array(240, 248));
  $ascii['u'] = range(249, 252);
  // Código ASCII dos outros caracteres
  $ascii['b'] = array(223);
  $ascii['c'] = array(231);
  $ascii['d'] = array(208);
  $ascii['n'] = array(241);
  $ascii['y'] = array(253, 255);
  foreach ($ascii as $key=>$item) {
    $acentos = '';
    foreach ($item AS $codigo) $acentos .= chr($codigo);
    $troca[$key] = '/['.$acentos.']/i';
  }
  $string = preg_replace(array_values($troca), array_keys($troca), $string);
  // Slug?
  if ($slug) {
    // Troca tudo que não for letra ou número por um caractere ($slug)
    $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
    // Tira os caracteres ($slug) repetidos
    $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
    $string = trim($string, $slug);
  }
  return $string;
}


include '../../config.php';
include ROOT.'model/Item.php';

//variaveis postada
$item_cdg = isset($_POST['item_cdg']) ? $_POST['item_cdg'] : -1;
$nome = isset($_POST['campo-nome']) ? $_POST['campo-nome'] : '';
$lat = isset($_POST['campo-lat']) ? $_POST['campo-lat'] : '';
$long = isset($_POST['campo-long']) ? $_POST['campo-long'] : '';
$descricao = isset($_POST['campo-descricao']) ? $_POST['campo-descricao'] : '';
$bairro = isset($_POST['campo-bairro']) ? $_POST['campo-bairro'] : '';
$cat = isset($_POST['campo-cat']) ? $_POST['campo-cat'] : '';
$telefone = isset($_POST['campo-telefone']) ? $_POST['campo-telefone'] : '';
$telefone2    = isset($_POST['campo-telefone2']) ? $_POST['campo-telefone2'] : '';
$telefon3 = -1;
$endereco = isset($_POST['txtEndereco']) ? $_POST['txtEndereco'] : '';
$email =  isset($_POST['campo-email']) ? $_POST['campo-email'] : '';
$web =  isset($_POST['campo-web']) ? $_POST['campo-web'] : '';
$h_segunda = isset($_POST['campo-h-segunda']) ? $_POST['campo-h-segunda'] : '';
$url =  isset($_POST['url']) ? $_POST['url'] : '';

if(trim($url) == ''){
    $url = criar_slug(utf8_decode($nome),'-');   
}

//upar imagem se tiver
$nome_imagem = null;
include ROOT.'control/upload_arquivo.php'; 
require_once ROOT.'view/wide/lib/WideImage.php';
$nome_imagem =  upar('arquivo',date("dmYHis").$_SESSION["USUARIO_CDG"].'-');
$nome_imagem_capa =  upar('arquivo-capa',date("dmYHis").$_SESSION["USUARIO_CDG"].'-');


//echo $nome_imagem;
//die;
///criar miniatura
if(isset($nome_imagem))
    if((trim($nome_imagem) != '') && ($nome_imagem != -1)){
        
        $image = WideImage::load(ROOT.'view/img/uploads/'.$nome_imagem);
        $image = $image->resizeDown(200, 200, 'inside');
        $image->saveToFile(ROOT.'view/img/uploads/mini/'.$nome_imagem);
}








$Item = New Item();
 
$item_inserido = $Item->gravar($item_cdg,
              $nome,
              $lat, 
              $long, 
              $nome_imagem, 
              $nome_imagem_capa, 
              $descricao, 
              $url, 
              $cat, 
              $bairro, 
              $telefone, 
              $telefone2,   
              $telefon3, 
              $endereco ,
              $email, 
              $web, 
              $h_segunda,
              $_SESSION['USUARIO_CDG']);
 
 if($item_inserido == -1):
   $item_inserido = $item_cdg;
 endif;
 
 header('Location: '.ROOT_URL.'control/item/add_item.php?i='.$item_inserido);
