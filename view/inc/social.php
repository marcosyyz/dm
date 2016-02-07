   
    <div class="icon_descr_block">
        
       
        <?php $endereco_atual = 'http://'.$_SERVER ['SERVER_NAME'].$_SERVER ['REQUEST_URI']; ?>
        <div class="cols <?php echo $posicao_botoes ?>">      
            <!-- Twitter -->
            <a href="http://twitter.com/share?url=<?php echo $endereco_atual ?>" target="_blank" class="share-btn twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <!-- Google Plus -->
            <a href="https://plus.google.com/share?url=<?php echo $endereco_atual ?>" target="_blank" class="share-btn google-plus">
                <i class="fa fa-google-plus"></i>
            </a>

            <!-- Facebook -->
            <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $endereco_atual ?>" target="_blank" class="share-btn facebook">
                <i class="fa fa-facebook"></i>
            </a>      

            <!-- Email -->
            <a href="mailto:?subject=Diretorio%20Mogi&body=<?php echo $endereco_atual ?>" target="_blank" class="share-btn email">
                <i class="fa fa-envelope"></i>
            </a>

              <!-- LIKE -->
            <a href="javascript:enviar_curtida('like',1);" target="_blank" class="share-btn green">
                <i class="fa fa-thumbs-up"></i> 
            </a>     
              
                      <!-- DISLIKE -->
            <a href="javascript:enviar_curtida('dislike',-1);" target="_blank" class="share-btn reddit">
                <i class="fa fa-thumbs-down"></i>
            </a>                         
                      <div id="contador-like"   class="cor-like contador-<?php echo $identificador ?> posicao-like-<?php echo $identificador ?>"><?php echo $Curtida->total(1) ?></div>
                       <div id="contador-dislike"  class="cor-dislike contador-<?php echo $identificador ?> posicao-dislike-<?php echo $identificador ?>"><?php echo $Curtida->total(-1) ?></div> 
        
        </div>  
       
             <!-- data-layout="button" -->                
         <!--// data-href="http://www.facebook.com/ampliatta" -->                                                          
    </div>            