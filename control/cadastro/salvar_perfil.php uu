<?php
include '../../config.php';
include ROOT.'model/Usuario.php';

//variaveis postada
$usuario_cdg = isset($_POST['usuario_cdg']) ? $_POST['usuario_cdg'] : -1;
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$uf = isset($_POST['uf']) ? $_POST['uf'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$senha = isset($_POST['alterar-senha']) ? $_POST['alterar-senha'] : null;
if(trim($senha) == '')
    $senha = null;

//upar imagem se tiver
$nome_imagem = null;
include ROOT.'control/upload_arquivo.php'; 
require_once ROOT.'view/wide/lib/WideImage.php';
$nome_imagem =  upar('arquivo',date("dmYHis").$usuario_cdg.'_');

///atualizar session da imagem do user
if(isset($nome_imagem))
    if((trim($nome_imagem) != '') && ($nome_imagem != -1)){
        $_SESSION['USUARIO_IMAGEM'] = ROOT_URL.'view/img/uploads/'.$nome_imagem;
        
        $image = WideImage::load(ROOT.'view/img/uploads/'.$nome_imagem);

        if($image->getWidth() > $image->getHeight()){
            $inicio_corte = ($image->getWidth() - $image->getHeight()) / 2;
            $image = $image->resizeCanvas($image->getHeight(),$image->getHeight(),-$inicio_corte,0);
        }
        if($image->getHeight() > $image->getWidth()){
            $inicio_corte = ($image->getHeight() - $image->getWidth()) / 2;
            $image = $image->resizeCanvas($image->getWidth(),$image->getWidth(),0,-$inicio_corte);
        }

        $image->saveToFile(ROOT.'view/img/uploads/'.$nome_imagem);        
}

if($nome_imagem == -1){
    $status_up = $nome_imagem ;
}else{
    $status_up  = 0;
}

//gravar no bd
$Usuario = New Usuario();
$novo = $Usuario->gravar($usuario_cdg,
                    $nome,
                    null,
                    $senha,
                    $nome_imagem,
                    null,
                    $cidade,
                    $uf,
                    $telefone
                );


header('Location: '.ROOT_URL.'control/cadastro/editar_perfil.php?s=1&f='.$status_up);


