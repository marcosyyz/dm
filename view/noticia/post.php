    <?php include ROOT.'view/head.php'; ?>
    <link href="<?php echo ROOT_URL ?>view/css/share.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>

<title>Notícias de Mogi das Cruzes - Diretório Mogi </title>

<?php include ROOT.'view/template_pagina.php' ?>

        
<!--content-->
<div class="col-md-12 basic" >
<div class="place_li_cont" >
<!--headlines-->
<!--Blog post style one-->
<div class="post p_style_one open" style=" background-position: bottom; background-image: url(<?php echo ROOT_URL.'view/img/uploads/mogiurubu.jpg' ?>);">
    <div class="open post_info">
        <h1><span itemprop="name">            
                <?php echo isset($Noticia->titulo) ? $Noticia->titulo : ''; ?>
            </span>
            <span class="linha_azul"></span>
        </h1>
    </div>
</div>
<div itemprop="articleBody" class="post_content">
    <?php 
    if(isset($imagem_caminho_completo)){
        echo ' <center><img itemprop="image" style="height:405px; width:582px" ';
        echo ' src="'.$imagem_caminho_completo.'" /> ';
        echo ' </center> ';
    }
    echo isset($Noticia->texto) ?  ($Noticia->texto) : ''; 
    ?>
    
<!--subscribe
<div class="Subscribe">
    <div>
        <h2>Subscribe now</h2>
        <form>
            <input type="text"><button class="btn btn-danger">Subscribe</button>
        </form>
    </div>
</div>-->
<div> <?php include ROOT.'view/social.php' ?> </div>
<div class="p_footer">
<ul>
    <li><a href="<?php echo ROOT_URL.'noticias'?>"><span itemprop="articleSection"><i class="fa fa-tags"></i><?php echo $Noticia->categoria; ?></span></a></li>
    <li><a itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" href="08.html">
            <span itemprop="ratingCount">
                <i class="fa fa-comments"></i><?php echo $Comentario->total_atual.' '.($Comentario->total_atual > 1 ? 'Comentários' : 'Comentário'); ?>
            </span>
        </a>
    </li>
    <li><a href="#"><span itemprop="datePublished" content="<?php echo $Noticia->data_eua; ?>"><i class="fa fa-calendar"></i><?php echo $Noticia->data; ?></span></a></li>
    <li><a href="#"><span><i class="fa fa-user"></i><span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php echo $Noticia->criador; ?></span></span></span></a></li>    
    <?php 
        if(isset($_SESSION['USUARIO_NIVEL']))
        if($_SESSION['USUARIO_NIVEL'] == 2 )
             echo "<li><a href='".ROOT_URL."view/admin/editor/editor.php?n=".$Noticia->noticia_cdg."'><span>Editar Post</span></a></li>";
    ?>
</ul>

</div>
<br>
    <center>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Publicidade-728 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-7836244233199181"
         data-ad-slot="5953428752"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </center>

</div>
</div>


<div id="div_comentarios" class="reviews open">


<!--review-->
<?php foreach($comentarios as $c){ ?>
    <div class="rev">
        <div class="user">
            <!--user avatar-->
            <a href="#" class="user_avatars">
                <div class="user_go">
                    <i class="fa fa-link"></i>
                </div>
                <img src="<?php echo ($c['USUARIO_CDG'] != 1) ? 
                            (isset($_SESSION['IDSOCIAL'])? '' : ROOT_URL.'view/img/uploads/').$c['USUARIO_IMAGEM'] :
                            $imagem_anonimo ?>" alt="Avatar usuario avaliação">
            </a>
        </div>
        <div class="texts">
            <div class="head_rev">
                <a href="03.html"><?php echo $c['USUARIO_NOME'] ?></a> 
                <span><?php echo $c['DATA'] ?></span>
            </div>
            <div class="text_rev">
                <?php echo $c['COMENTARIO_TEXTO'] ?>
            </div>           
        </div>
    </div>
<?php } ?>
<!--review end-->


</div>
<div class="reviews open">
<form name="form_enviarcomentario" id="form_comentario" method="post" action="<?php echo ROOT_URL.'control/enviar_comentario.php?n='.$Noticia->noticia_cdg ?>" >
    <!--add comment-->
    <div class="add_comment">
    <h4>Comente!</h4>
    <textarea id="texto_comentario"></textarea>
    <a href="javascript:enviar_comentario();" class="btn btn-success">Enviar Comentário</a>
    </div>
</form>
</div>

</div>
</div>
</div>
</div>
</div>


<!--
#################################
- SCRIPT FILES -
#################################
-->


<script type="text/javascript">
   "use strict";
$('#inb').parallax({
'elements': [
{
'selector': '#inb',
'properties': {
'x': {
'background-position-x': {
'initial': 20,
'multiplier': 0.03,
'invert': true
}
},
'y': {
'background-position-y': {
'initial': 60,
'multiplier': 0.03,
'invert': true
}
}
}
}
]
});
</script>
<script>         
    
    
function enviar_curtida(nome,p_tipo) { 
    
  $.ajax({
    type: "POST",
    url: "<?php echo ROOT_URL.'control/enviar_curtida.php'; ?>",
    data: {
      noticia: <?php echo $Noticia->noticia_cdg ?>,
      usuario: <?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_CDG'] : 1 ?>,
      tipo:p_tipo
    },
    success: function(data) {     
     
        if(nome == 'like'){
            $('#contador-like').html(
                (<?php echo  $Curtida->total(1)  ?> + Number(data) )
            );
        }else{
            $('#contador-dislike').html(
                (<?php echo  $Curtida->total(-1)  ?> + Number(data) )
            );
        }                   
        
    }
  });
}


  function enviar_comentario() {
  $.ajax({
    type: "POST",
    url: "<?php echo ROOT_URL.'control/enviar_comentario.php?n='.$Noticia->noticia_cdg ?>",
    data: {
      texto_comentario: $('#texto_comentario').val(),
      usuario: <?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_CDG'] : 1 ?>
    },
    success: function(data) {
      $('#div_comentarios').append(" <div class='rev'> "
        +" <div class='user'>"
        +"     <!--user avatar-->"
        +"     <a href='03.html' class='user_avatars'>"
        +"         <div class='user_go'>"
        +"             <i class='fa fa-link'></i>"
        +"         </div>"
        +"         <img src='<?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_IMAGEM'] :
                            $imagem_anonimo ?>' alt=''>"
        +"     </a>"
       +"  </div>"
        +" <div class='texts'>"
        +"     <div class='head_rev'>"
        +"         <a href='#'> <?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_NOME'] :
                             'Anônimo' ?></a> "
        +"         <span>agora</span>"
        +"     </div>"
        +"     <div class='text_rev'>"
       +"          "+$('#texto_comentario').val()+" "
      +"       </div>"
     +"    </div>"
   +"  </div>'");
    },
    error: function(){
        alert('Erro ao enviar comentário.');
    }
  });
}
</script>

</body>
</html>