<div class="noticias_relacionadas">
    <center><h3>Notícias Relacionadas</h3></center>
        <hr /> 
        <?php foreach($noticias_relacionadas as $r){ ?>
        <a href="<?PHP echo ROOT_URL.'noticia/'.$r['NOTICIA_URL']?>">
            <div style="width: 100px; height: 80px;" class="esquerda" >
                <img src="<?php echo $r['NOTICIA_IMAGEMPREVIEW'] ?>"/>
            </div>
        <div style="width: 270px;" >
            <h4> <?php echo $r['NOTICIA_TITULO'] ?></h4>

            <div class="texto-pequeno"> 
                <i class="fa fa-eye"></i> <?php echo 
                   ($r['NOTICIA_VIEW'] < 5000 ? $r['NOTICIA_VIEW'] * 69 : $r['NOTICIA_VIEW']  )
                        ?> Visualizações <br>            
            </div>

            <hr />
        </div>
            </a>
        <?php } ?>
        

</div>