  
    <?php include ROOT.'view/head.php';  ?>  
    <link href="<?php echo ROOT_URL ?>view/css/share.css" rel="stylesheet">    
    <!--<script type="text/javascript" src="js/map_visits.js"></script>    -->
    <title><?php echo $SEO->getTitle() ?></title>                 
    <style>
        .header_section {
          <?php if(trim($Item->imagem_capa) != '') { 
                    echo " background: url(".ROOT_URL.'view/img/uploads/'.$Item->imagem_capa.") no-repeat;";
                }elseif(trim($Item->imagem) != '') {
                    echo " background: url(".ROOT_URL.'view/img/uploads/'.$Item->imagem.") no-repeat;";
                } ?>
            background-position: center; 
            background-size: cover; 
        }
    </style>
    
</head>
    
<body onload="initMap()" class="inner_page innerpage">
    
<div class="bg_parallax" id="inb">

    <?php include ROOT.'view/menu_esquerdo.php'; ?>

    <?php include ROOT.'view/add_local.php'; ?>

    <?php include ROOT.'view/login.php'; ?>

    <div class="site-overlay"></div>

    <div id="container">

    <?php include ROOT.'view/cabecalho_menor.php'; ?>

    <div  itemscope itemtype="http://schema.org/LocalBusiness" itemref="_aggregateRating6" class="container page_info">
    <div class="col_md_12">
        <img itemprop="image" src="<?php echo ROOT_URL. (trim($Item->imagem) != '' ? 'view/img/uploads/'.$Item->imagem : 'view/img/c_logo.jpg') ?>" alt="<?php echo $Item->nome ?>">
        <h1  itemprop="name" ><?php echo $Item->nome ?></h1>
        <ul itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" itemref="_addressRegion5">
            <li><a href='<?php echo ROOT_URL.'index.php?c='.$Item->categoria_cdg; ?>'>
                <?php echo $Item->categoria_nome ?> &nbsp;&nbsp; - </a>  
            </li>
            <li>
                <a href="<?php echo ROOT_URL.'index.php?b='.$Item->bairro_cdg; ?>"><span itemprop="addressLocality">
                    <?php echo $Item->bairro_nome ?></span></a>
            </li>       
        </ul>
    </div>
    </div>

    <div class="container contant">
    <div class="row cont">
    <!-- Left column-->
    <div class="col-md-3 mobile_none sidebar">
    <div>
    <!--map place point-->
    <div class="address">
        <?php echo $Item->endereco .', '.$Item->bairro_nome ?>,
        <br><span id="_addressRegion5" itemprop="addressRegion">Mogi das Cruzes, SP<span>
        <span class="setinha"></span>
    </div>
    
    <div id="map_place" class="map_place"></div>
    
    <!--Similar Place-->
    <div class="similar">
        <h3>Locais Similares:</h3>
        <?php 
        
        foreach($Item->itens_similares() as $similar){            
            echo '<div>';
            echo '<img src="'.ROOT_URL.'view/img/uploads/mini/'.$similar['ITEM_IMAGEM'].'" alt="'.$similar['ITEM_NOME'].'">';
            echo '<a href="'.ROOT_URL.'lugares/'.$similar['ITEM_URL'].'">'.$similar['ITEM_NOME'].'</a>';
            echo '<i class="fa fa-thumbs-o-up"></i>'.$similar['TOTAL_CURTIDAS'].' Likes';
            echo '</div>';
        } 
        ?>
        
        
    </div>
    </div>
    </div>
    
        

<!--content-->
<div class="col-md-9 basic"> 
   
<!--Header section-->
<div class="header_section">
    
</div>
<?php if($Item->telefone != ''){ ?>
    <!--Phone info-->
    <div class="phone_email">
        <span itemprop="telephone">
            <span><i class="fa fa-phone"></i><?php echo $Item->telefone ?></span>
            <span><i class="fa fa-globe"></i>                
                <a itemprop="url" href="<?php echo $Item->web ?>"><?php echo $Item->web ?></a>
            </span>
        </span>
    </div>
<?php } ?>
    
    
   
<?php include ROOT.'view/inc/social.php' ?>  
    
<?php if(trim($Item->descricao) != '')  {   
    echo '<div class="item-descricao">'.$Item->descricao.'</div>';
}?>
    
<div id="_aggregateRating6" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="reviews">
    <div id="div_comentarios">

<!--loop comentarios-->
<?php 

    $first = true;
	//esquema para nao usar in_array()
	$avaliacoes = array(1,2,3,4,5);
	foreach(array_values($avaliacoes) as $v) $avaliacoes_invertido[$v] = 1;
	
    foreach($comentarios as $c){ ?>
    <div <?php echo ($first ? 'itemprop="bestRating"' : '' ); ?> class="rev">
        <div class="user">
            <!--user avatar-->
            <a href="#" class="user_avatars">
                <div class="user_go">
                    <i class="fa fa-link"></i>
                </div>
                <img src="<?php echo $c['USUARIO_IMAGEM'] ?>" alt="Avatar usuario avaliação">
            </a>
        </div>
        <div class="texts">
            <div class="head_rev">
                <a href="<?php echo ROOT_URL.'control/cadastro/perfil.php?u='.$c['USUARIO_CDG'] ?>"><?php echo $c['USUARIO_NOME'] ?></a> 
                <?php if(isset($c['COMENTARIO_RATING'])){
					if(isset($avaliacoes_invertido[$c['COMENTARIO_RATING']])){
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo '<img style="top:-2px; position:relative;" src="'.ROOT_URL.'view/img/'.$c['COMENTARIO_RATING'].'estrelas.jpg" />';
                    }
                }?>
                <span><?php echo $c['DATA'] ?></span>
            </div>
            <div class="text_rev">
                <?php echo $c['COMENTARIO_TEXTO'] ?>
            </div>           
        </div>
    </div>
<?php 
       $first = false;
    } ?>
<!--fim loop comentarios-->
</div>
    
    

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
<script>
function enviar_curtida(nome,p_tipo) {
   
  $.ajax({
    type: "POST",
    url: "<?php echo ROOT_URL.'control/enviar_curtida.php'; ?>",
    data: {
      item: <?php echo $Item->item_cdg ?>,
      usuario:<?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_CDG'] : 1 ?>,
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
        
    },
    error: function(){
        alert('Erro ao enviar curtida.');
    }
  });
}

function enviar_comentario() {
  $.ajax({
    type: "POST",
    url: "<?php echo ROOT_URL.'control/enviar_comentario.php?i='.$Item->item_cdg ?>",
    data: {
      texto_comentario: $('#texto_comentario').val(),
      usuario: <?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_CDG'] : 1 ?>,
      rating: nota
    },
    success: function(data) {
        
        if(data == 1){
              $('#div_comentarios').append(" <div class='rev'> "
                +" <div class='user'>"
                +"     <!--user avatar-->"
                +"     <a href='#' class='user_avatars'>"
                +"         <div class='user_go'>"
                +"             <i class='fa fa-link'></i>"
                +"         </div>"
                +"         <img src='<?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_IMAGEM'] :
                            $imagem_anonimo ?>' alt='avatar usuario avaliou'>"
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
           $('#texto_comentario').val('')
    }else{
        alert(data);
    }
    },
    error: function(){
        alert('Erro ao enviar comentário.');
    }
  });
}



</script>




<!--adicionar comentarios-->
<div class="add_comment">
    <?php if($total_comentarios > 0 ){ ?>
        <h4>
            <span itemprop="ratingCount">
                <?php echo $total_comentarios;  echo ($total_comentarios > 1 ? ' Comentários' : ' Comentário') ?>.
            </span>
        </h4>
    <?php } ?>
    
<div  class="esquerda">
    <h3>    Deixe a sua Avaliação.        </h3>
</div>

    
    
    
        <?php include ROOT.'view/rating.php'; ?>
    
  

<textarea id="texto_comentario"></textarea>
<a href="javascript:enviar_comentario();" class="btn btn-success">Enviar Comentário</a>
</div>
</div>
    <div style="margin:auto;height:240px;width:840px;overflow:hidden"> 
        <div class="fb-like-box" data-href="http://www.facebook.com/guiadiretoriomogi" data-width="852" 
             data-height="240"   data-show-faces="true" 
             data-stream="false" data-show-border="false" 
             data-header="false" data-connections="10"></div> 
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


<!--Parallax-->


<script type="text/javascript" src="<?php echo ROOT_URL ?>view/js/jquery.parallax-0.2-min.js"></script>
  <!--Map js-->
<script>    
function initMap() {
  var myLatLng = {lat: <?php echo $Item->lat ?>, lng: <?php echo $Item->long ?>};

  
  var map = new google.maps.Map(document.getElementById('map_place'), {   
    zoom: 15,
    center: myLatLng,
    scrollwheel: false,
    panControl: false,    
    zoomControl: false,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,   
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: '<?php echo str_replace("'", "\\'", $Item->nome) ?>',
    category: '<?php echo ROOT_URL.'view/img/icon/'.$Item->icone_map ?>',
    icon: '<?php echo ROOT_URL.'view/img/icon/'.$Item->icone_map ?>',
  });
}    
    
</script>

<!--Parallax bg-->
<script type="text/javascript">
   "use strict";
$('#inb').parallax({
'elements': [
{
'selector': '#inb',
'properties': {
'x': {
'background-position-x': {
'initial': 0,
'multiplier': 0.03,
'invert': true
}
},
'y': {
'background-position-y': {
'initial': 30,
'multiplier': 0.03,
'invert': true
}
}
}
}
]
});
</script>
<!--Flickr widget-->
<script type="text/javascript">
   "use strict";
$('#basicuse').jflickrfeed({
limit: 6,
qstrings: {
id: '52617155@N08'
},
itemTemplate: 
'<li>' +
'<a href="{{image_b}}"><img src="{{image_m}}" alt="{{title}}" /></a>' +
'</li>'
});
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=857763154235722";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
    document.getElementById('fb-like').innerHTML = '<iframe [...]></iframe>';
</script>

 <script type="text/javascript"  src="<?php echo ROOT_URL ?>view/js/geral.js"></script>
</body>
</html>

