<div class="ranking_usuario">
    <center><h3>Ranking de Usuários</h3></center>
    <hr /> 
        <?php foreach($ranking as $u){ ?>
        <a href="<?php echo ROOT_URL.'control/cadastro/perfil.php?u='.$u['USUARIO_CDG'] ?>">
            <div class="avatar esquerda">
                <img src="<?php echo $u['USUARIO_IMAGEM'] ?>"/>
                
            </div>

            <h4><?php echo $u['USUARIO_NOME'] ?></h4>
        </a>   
            <div class="texto-pequeno esquerda"> 
                <i class="fa fa-pencil-square-o"></i> <?php echo $u['AVALIACOES'] ?> Avaliações <br>
                <i class="fa fa-map-marker"></i> <?php echo $u['CADASTROS'] ?> Locais cadastrados
            </div>
         
            <br>
            <hr />    
        
        <?PHP } ?>
                                        
        <br>
        <div  class="ad" style="margin-left: 12px; padding: 20px 0 20px 0; ">
            <a href="<?php echo ROOT_URL.'control/cadastro/usuario.php' ?>" >
                <h2 align="center">Colabore com a cidade! <br>
                Cadastre lugares conhecidos e avalie...
                </h2>
            </a>
        </div>

        

</div>

