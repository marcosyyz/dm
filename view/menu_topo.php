
                        <ul id="menu-topo">
                            <?php 
                              if(isset($map)){
                                echo '<li><a href="'.ROOT_URL.'noticias" class="active">Notícias</a></li>';
                              }else{
                                echo '<li><a href="'.ROOT_URL.'lugares" class="active">Lugares</a></li>';                                
                              }
                            ?>
                            <li><a href="<?php echo ROOT_URL.'noticias'?>">Informação</a>
                             <ul class="sub-menu">
                                    <li><a href="<?php echo ROOT_URL.'telefones-uteis'?>">Telefones úteis</a></li>
                                    <li><a href="<?php echo ROOT_URL.'telefones-prefeitura'?>">Telefones Prefeitura Mogi</a></li>
                                    <li><a href="<?php echo ROOT_URL.'horarios-trem-expresso-leste'?>">Horários Expresso Leste</a></li>                                 
                                </ul>                            
                            </li>
                            <li><a href="<?php echo ROOT_URL.'contato'?>">Contato</a></li>
                            <li id="btn-adicionar-lugares"><a style="background-color: #049d65;" href="<?php echo ROOT_URL.'control/item/add_item.php'?>">Adicionar Lugares</a></li>
                        </ul>                       
                           