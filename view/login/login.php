    <?php include ROOT.'view/head.php';  ?>       
    <title><?php echo $SEO->getTitle() ?></title>
</head>
    
<?php include ROOT.'view/template_pagina.php'; ?>

     <!--content-->
<div class="col-md-12 basic" >   
<br>			
<div class="container">
    <div class="row">
        
        
       <div class="tela_login forms central">
            <?php if($status == 1){ ?>
                <p><br>&nbsp;</p>
                <div class="status_ok">
                    <center>Cadastro Efeuado com Sucesso!</center>
                </div><p><br>&nbsp;</p>
            <?php } ?>
                
            <?php if($status == -1){ ?>
                <p><br>&nbsp;</p>
                <div class="status_erro">
                    <center>Seu usuário ou senha estão errados.!</center>
                </div><p><br>&nbsp;</p>
            <?php } ?>
            <h3>Entrar no Diretório Mogi!<span></span></h3>
            <form name="form_logar" action="<?php echo ROOT_URL.'control/login/logar.php' ?>"  method="post">
                <label>Login:<input id="campo-nome" name="nome" type="text"></label>
                <label>Senha:<input id="campo-senha" name="senha" type="password"></label>
                <a href="javascript:form_logar.submit();" class="btn btn-success">Entrar/Cadastrar</a>
                <a href="<?php echo $dialog_url ?>" class="btn btn-primary"><i class="icon-facebook"></i>Entrar com Facebook</a>
                <a href="javascript:login_google();" class="btn btn-vermelho">Entrar com Gmail</a>
            </form>
            <script>
                $( "#campo-nome" ).keydown(function( event ) {
                  if ( event.which == 13 ) {
                         form_logar.submit();         
                  }
                });

                $( "#campo-senha" ).keydown(function( event ) {
                  if ( event.which == 13 ) {
                         form_logar.submit();         
                  }
                }); 
            
                $( "document" ).ready(function() {                  
                    $('#campo-nome').focus();    
                });
</script>
            </script>
       </div>   


 </div>
    
</div>
