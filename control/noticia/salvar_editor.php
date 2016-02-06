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
include ROOT.'model/Noticia.php';
 
$post = New Noticia();

$noticia_cdg = isset($_POST['noticia']) ? $_POST['noticia'] : '';
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
$url = isset($_POST['url']) ? $_POST['url'] : '';
$texto = isset($_POST['editor1']) ? $_POST['editor1'] : '';
$resumo = isset($_POST['resumo']) ? trim($_POST['resumo']) : '';
$publicado = isset($_POST['publicado']) ? trim($_POST['publicado']) : 0;
$data = isset($_POST['data']) ? trim($_POST['data']) : '';

$imagem_input =         (isset( $_POST['imagem_principal']) ? trim( $_POST['imagem_principal']) : '');
$imagem_preview_input = (isset( $_POST['imagem_preview'])   ? trim( $_POST['imagem_preview'])   : '');
$imagem_url =           isset($_POST['imagem_url']) ? trim($_POST['imagem_url']) : '';

//variaveis que vao receber o upload
$nome_imagem = null;
$nome_imagem_preview = null;

include ROOT.'control/upload_arquivo.php';
$nome_imagem =  upar('arquivo');
$nome_imagem_preview =  upar('arquivo_preview');

if ( get_magic_quotes_gpc() )
    $texto = htmlspecialchars( stripslashes((string)$texto) );
else
    $texto = htmlspecialchars( (string)$texto );
     

if(trim($url) == ''){
    $url = criar_slug(utf8_decode($titulo),'-');   
}


//echo  $imagem_input.':<br>';
$nome_imagem = (isset($nome_imagem) ? $nome_imagem : $imagem_input) ;
$imagem_preview = (isset($nome_imagem_preview) ? $nome_imagem_preview : $imagem_preview_input) ;
 

//echo $data.'<p>'.$publicado;
        
$noticia_inserida = $post->gravar($noticia_cdg,
                                    $titulo,
                                    $url,
                                    $texto,
                                    $resumo,
                                    $nome_imagem,
                                    $imagem_preview,
                                    $imagem_url,
                                    $data,
                                    $publicado
                                );

if($noticia_inserida != -1) {
     $noticia_cdg =  $noticia_inserida ;
}
 
header("Location: ".ROOT_URL."view/admin/editor/editor.php?n=".$noticia_cdg."&s=s"); 