<!--header-->
<div class="container-fluid header_menor inner_head">
    <div class="fixed_w">
        <div class="row">
            <form name="form_busca" class="" id="form_busca"  action="<?php echo ROOT_URL; ?> " method="post">
                <div class="col-md-12">
                    <a href="<?php echo ROOT_URL  ?>" class="logo">
                        <img src="<?php echo ROOT_URL ?>view/img/Diretorio-Mogi-logotipo-pequeno.png" alt="Diretório Mogi"/>
                    </a>
                    
                    <input type="text" name="filtro_busca" class="search" placeholder="Procurar">
                    <a href="#" class="green_btn_header" >+</a>
                                        <ul id="menu"> 
                        <li><a>&#9776;</a> 
                            <div class="columns"> 
                                            <ul class="col"> 		
                                                <li><a href="<?php echo ROOT_URL ?>control/noticia/noticias.php">Notícias</a></li>
                                                <li><a href="#">Lugares</a></li>
                                                 <li><a href="#">Informação</a></li>
                                            </ul>						
                            </div>
                        </li> 
                    </ul>   
                    
                </div>
            </form>
        </div>
    </div>
</div>