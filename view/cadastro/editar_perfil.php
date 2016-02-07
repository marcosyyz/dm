    <?php include ROOT.'view/head.php';  ?>       
    <title><?php echo $SEO->getTitle() ?></title>
</head>
    
<?php include ROOT.'view/inc/template_pagina.php'; ?>

     <!--content-->
<div class="col-md-12 basic" >   
<br>			
<div class="container">
    <div class="row">
   
        
       <div class="tela_login forms central">
         
         <a  href="<?php echo ROOT_URL.'control/cadastro/perfil.php?u='.$_SESSION['USUARIO_CDG'] ?>" >Ver Perfil</a>
         
         
            <?php if($status == 1){ ?>
                <p><br>&nbsp;</p>
                <div class="status_ok">
                    <center>Alterações Efetuadas com Sucesso!</center>
                </div><p><br>&nbsp;</p>
            <?php } ?>
                
            <?php if($status == -1){ ?>
                <p><br>&nbsp;</p>
                <div class="status_erro">
                    <center>Ocorreu um erro ao atualizar as informações!</center>
                </div><p><br>&nbsp;</p>
            <?php } ?>
                
                <?php if($status_up == -1){ ?>
                <p><br>&nbsp;</p>
                <div class="status_erro">
                    <center>Ocorreu um erro com o upload da imagem.</center>
                </div><p><br>&nbsp;</p>
            <?php } ?>
                <br>
            <form name="form_alterar" action="<?php echo ROOT_URL.'control/cadastro/salvar_perfil.php' ?>"  method="post" enctype="multipart/form-data">
                <input type="hidden" name="usuario_cdg" value="<?php echo $_SESSION['USUARIO_CDG'] ?>"/>
                <div style="margin-left: 20px;width:255px;" class="">
                  <img width="255px" src="<?php echo (trim($Usuario->getImagem()) == '' ) ? $imagem_anonimo : $Usuario->getImagem() ?>" />
                </div>               <br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alterar Foto :</strong>
                &nbsp;<input type="file" name="arquivo" /><br>
                <h3><?php echo $Usuario->getLogin();?><span></span></h3>
                <label>Nome Completo:<input id="campo-nome" name="nome" type="text" value="<?php echo $Usuario->getNome(); ?>"></label>
                <label>Telefone:<input id="campo-telefone" name="telefone" type="text" value="<?php echo $Usuario->getTelefone(); ?>"></label>
                <label>Cidade:<input id="campo-cidade" name="cidade" type="text" value="<?php echo $Usuario->getCidade(); ?>"></label>
                <label>UF:<input id="campo-uf" name="uf" type="text" value="<?php echo $Usuario->getUF(); ?>"></label>
                <label>Alterar Senha:<input  autocomplete="off" id="campo-alterar-senha" name="alterar-senha" type="password" value=""></label>
                <label>Confirmar Senha:<input  autocomplete="off" id="campo-confirmar-senha" name="confirmar-senha" type="password"></label>
                
                <a href="javascript:form_alterar.submit();" class="btn btn-success">Salvar</a>                
            </form>
            
       </div>   


 </div>

</div>
