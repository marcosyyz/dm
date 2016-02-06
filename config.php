<?php
  // inicia a sessão
session_cache_expire(10);
session_start('');

//variaveis de caminhos
define('ROOT_URL', 'http://localhost/diretoriomogi/');
define('ROOT', dirname(__FILE__) . '/');

$imagem_anonimo = ROOT_URL.'view/img/avatar/anonimo.png';
        
?>
