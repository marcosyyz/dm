<?php
include '../../config.php';
include ROOT.'model/Usuario.php';
include ROOT.'model/SEO.php';



    $usuario_cdg = isset($_GET['u']) ? $_GET['u'] : -1;
    
    $usuario_cdg = ($usuario_cdg == -1 ? $_SESSION['USUARIO_CDG']  : $usuario_cdg );
    
    $Usuario = New Usuario($usuario_cdg);
  
    $SEO = New SEO();

    $SEO->setTitle('Perfil - '.$Usuario->getNome());


    
    
    include ROOT.'view/cadastro/perfil.php';
    

