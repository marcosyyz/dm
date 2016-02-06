<?php 

function upar($campo,$nome_extra=''){
    
if(!isset( $_FILES[$campo]['name'] ))
  return null;
if((trim($_FILES[$campo]['name']) == ''))
  return null;
  
$pasta = 'view/img/uploads/';

$_UP['caminho_pasta'] = ROOT.$pasta;
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
$_UP['extensoes'] = array('jpg', 'png', 'gif');
$_UP['renomeia'] = false;
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';




// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES[$campo]['error'] != 0) {
  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES[$campo]['error']]);
  exit; // Para a execução do script
}
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES[$campo]['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
  echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
  exit;
}
// Faz a verificação do tamanho do arquivo
if ($_UP['tamanho'] < $_FILES[$campo]['size']) {
  echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
  exit;
}
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
  $nome_imagem = md5(time()).'.jpg';
} else {
  // Mantém o nome original do arquivo
  $nome_imagem = $_FILES[$campo]['name'];
}
  
$nome_imagem  = $nome_extra.$nome_imagem;
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES[$campo]['tmp_name'], $_UP['caminho_pasta'] . $nome_imagem)) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
    
  return $nome_imagem;
} else {
  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
  return -1;  
}
 
}

