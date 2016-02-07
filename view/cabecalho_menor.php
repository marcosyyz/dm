<!--header-->
<div class="container-fluid header_menor inner_head">
    <div class="fixed_w">
        <div class="row">
            <form name="form_busca" class="" id="form_busca"  action="<?php echo ROOT_URL.'noticias'; ?> " method="post">
                <div class="col-md-12">
                    <div id="logotipo">
                        <a href="<?php echo ROOT_URL  ?>" class="logo">
                            <img src="<?php echo ROOT_URL ?>view/img/Diretorio-Mogi-logotipo-pequeno.png" alt="Diretório Mogi"/>
                        </a>                    
                    </div>
                    <input type="text" name="filtro_busca" class="search" placeholder="Procurar">
                     <div class="menu-topo-menor">
                        <?php include ROOT.'view/menu_topo.php'?>           
                     </div>
                         
                    
                </div>  
               
            </form>
        </div>
    </div>
</div>