<?php
include '../../config.php';
include ROOT.'model/mysql.php';


function removeAcentos($string, $slug = false) {
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






if(isset($_GET['url'])){ 
    /************************* categoria **************************/
    $bd = New MySQL();
    $bd->Query('SELECT CATEGORIA_NOME,CATEGORIA_CDG FROM CATEGORIA');

    if($bd->RowCount() > 0 ){
        while ($row = mysqli_fetch_array($bd->last_result,MYSQLI_ASSOC)) {
              $cats[]  =  array("cdg" => $row['CATEGORIA_CDG'],
                                "url" => removeAcentos(utf8_decode( $row['CATEGORIA_NOME']), '-' ) );
         }                
    }
    foreach ($cats as $C => $c){
        //echo $c['cdg'].' - '.$c['url'].'<br>';
        $bd->Query('UPDATE CATEGORIA SET CATEGORIA_URL = "'.$c['url'].'" 
                   WHERE CATEGORIA_CDG = '.$c['cdg'].' ');
    }
    echo 'urls tabela CATEGORIA ok.<br>' ;   
    
    
    /************************* noticia **************************/
    $bd = New MySQL();
    $bd->Query('SELECT NOTICIA_TITULO,NOTICIA_CDG FROM NOTICIA');

    if($bd->RowCount() > 0 ){
        while ($row = mysqli_fetch_array($bd->last_result,MYSQLI_ASSOC)) {
              $cats[]  =  array("cdg" => $row['NOTICIA_CDG'],
                                "url" => removeAcentos(utf8_decode( $row['NOTICIA_TITULO']), '-' ) );
         }                
    }
    foreach ($cats as $C => $c){
        //echo $c['cdg'].' - '.$c['url'].'<br>';
        $bd->Query('UPDATE NOTICIA SET NOTICIA_URL = "'.$c['url'].'" 
                   WHERE NOTICIA_CDG = '.$c['cdg'].' ');
    }
    echo 'urls tabela NOTICIA ok.<br>' ;   
}

