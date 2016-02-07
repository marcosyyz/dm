<!--Header-->
<div class="container-fluid header">
    <div class="row">
        <form name="form_busca" class="" id="form_busca"  action="<?php echo ROOT_URL ?> " method="post">
            <div class="col-md-12">
                     <div id="logotipo-maior">
                        <a itemscope itemtype="http://schema.org/SoftwareApplication" href="<?php echo ROOT_URL ?>" class="logo">
                                        <img  itemprop="image"  src="<?php echo ROOT_URL.'view/img/logo-Diretorio-Mogi.png'; ?>" alt="Diretório Mogi"/>
                        </a>
                    </div>
                    <input type="text" name="filtro_busca" class="search" placeholder="Procurar" value='<?php echo $filtro_busca ?>'/>                                        
                    <div class="menu-topo">
                        <?php include ROOT.'view/menu_topo.php'?>                                   
                    </div>

            </div>
        </form>
    </div>
</div>
