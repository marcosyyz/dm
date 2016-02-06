    
<!--navigation swipe-->
<div class="menu-btn">&#9776;</div>
<nav class="pushy pushy-left">
    <div class="profile user">
        <div class="avatar"><img id="user-photo"
                               src="<?php echo isset($_SESSION['USUARIO_IMAGEM']) ? 
                                                                     (trim($_SESSION['USUARIO_IMAGEM']) != ''  ?  $_SESSION['USUARIO_IMAGEM'] :  $imagem_anonimo  ) 
                                                      : $imagem_anonimo ?>"/>
                           <!--  <span>5</span> avisos  -->
        </div>
        <h3><a id="user-name"><?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_NOME'] :'Bem vindo'?></a></h3>
        <a href="<?php echo isset($_SESSION['USUARIO_CDG']) ? ROOT_URL.'control/login/deslogar.php' : '#' ?>" 
           class="log_btn <?php echo isset($_SESSION['USUARIO_CDG']) ? '' : 'chama_login' ?>">
                <?php echo isset($_SESSION['USUARIO_CDG']) ? 'Sair' : 'Entrar' ?>
        </a>
    </div>
    
    <ul class="side_menu">
        <?php if(isset($_SESSION['USUARIO_CDG'])){
          echo '<li><a href="'.ROOT_URL.'control/cadastro/perfil.php?u='.$_SESSION['USUARIO_CDG'].'"><i class="fa fa-bookmark-o"></i>Perfil</a></li>';
        }?>
        <li><a href="<?php echo ROOT_URL ?>noticias-mogi-das-cruzes-e-regiao"><i class="fa fa-bookmark-o"></i>Notícias</a></li>
        <li><a href="<?php echo ROOT_URL ?>" class="animsition-link"><i class="fa fa-map-marker"></i>Mapa</a></li>     
        <?php if(isset($_SESSION['USUARIO_CDG'])){
          echo '<li><a href="'.ROOT_URL.'control/item/add_item.php" class="animsition-link"><i class="fa fa-map-marker"></i>Adicionar Lugares</a></li>';
        } ?>
    </ul>
</nav>

<script>
    $( ".log_btn" ).click(function() {                  
        $('#input-nome').focus();    
    });
</script>
