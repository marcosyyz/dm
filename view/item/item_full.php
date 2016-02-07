  
    <?php include ROOT.'view/head.php';  ?>  
    <link href="<?php echo ROOT_URL ?>view/css/share.css" rel="stylesheet">    
    <!--<script type="text/javascript" src="js/map_visits.js"></script>    -->
    <title><?php echo $SEO->getTitle() ?></title>            
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
        <img itemprop="image" src="<?php echo ROOT_URL ?>view/img/c_logo.jpg" alt="">
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
            echo '<img src="'.ROOT_URL.'view/img/item/'.$similar['ITEM_IMAGEM'].'" alt="#">';
            echo '<a href="'.ROOT_URL.'control/item/item.php?i='.$similar['ITEM_CDG'].'">'.$similar['ITEM_NOME'].'</a>';
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
    

    
      
  <!-- <div  style="position:relative;margin-left: 408px;top: -43px ;" class="fb-like" 
             
             data-send="false" 
             data-width="120" 
             data-share="false" 
             data-show-faces="false" >
                 
   </div>--> 
    
    
    
    
    
    
    
<?php if(false){ ?>
    <!--icon description block-->
    <div class="icon_descr_block">
        <div class="cols">
        <div class="icons id_orange"><span class="ic"><i class="fa fa-comments-o"></i></span><span class="num">1034</span></div>
        <div class="icons id_green"><span class="ic"><i class="fa fa-users"></i></span><span class="num">1034</span></div>
        <div class="icons id_blue"><span class="ic"><i class="fa fa-globe"></i></span><span class="num">1034</span></div>
        </div>
        <div class="bubble"><div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s<span></span></div></div>
    </div>
    <!--Features info-->
    <div class="features_block">
        <div>
        <ul>
        <li>Hours: <b>Closed until 8:00am</b></li>
        <li>Reservations: <b>No</b></li>
        <li>Menus: <b>Brunch</b></li>
        </ul>
        </div>
        <div>
        <ul>
        <li>Credit Cards: <b>Yes (incl. Visa & MasterCard)</b></li>
        <li>Wi-Fi: <b>Yes</b></li>
        <li>Outdoor Seating: <b>No</b></li>
        </ul>
        </div>
    </div>
    <!--Share this place btn and total visitors-->
    <div class="share_block">
        <div>
        <a href="#" class="btn btn-success">Share this place</a>
        </div>
        <div>
        <div>
        <span>Total Visitors</span>
        419 total
        </div>
        <div>
        <span>Total Visitors</span>
        419 total
        </div>
        </div>
    </div>
    
    <!--Check in-->
    <div class="check_in">
        <div>
        <a href="03.html">Vlad Mickh</a> likes this place. Your Swarm friend <a href="03.html">Mattew</a> has checked in here.
        <div class="users_group">
        <!--user-->
        <a href="03.html" class="user_avatars">
        <div class="user_go">
        <i class="fa fa-link"></i>
        </div>
        <img src="<?php echo ROOT_URL ?>view/img/avatar/ava_3.jpg" alt=""></a>
        <!--user-->
        <a href="03.html" class="user_avatars">
        <div class="user_go">
        <i class="fa fa-link"></i>
        </div>
        <img src="<?php echo ROOT_URL ?>view/img/avatar/ava_4.jpg" alt=""></a>
        </div>
    </div>
    </div>
    <!--Mobile visibli-->
    <div class="mobile_place">
        <div class="address">
        Mordovceva street, 6 (Up on"Semenovskaya"), 690091, Vladivostok</div>
        <div class="similar">
        <h3>Similar places:</h3>
        <div>
        <img src="<?php echo ROOT_URL ?>view/img/avatar/ava_11.jpg" alt="#">
        <a href="#">Cafe "Oki-Doki"</a>
        <i class="fa fa-thumbs-o-up"></i>34 likes
        </div>
        <div>
        <img src="<?php echo ROOT_URL ?>view/img/avatar/ava_12.jpg" alt="#">
        <a href="#">Cafe "Oki-Doki"</a>
        <i class="fa fa-thumbs-o-up"></i>123 likes
        </div>
        <div>
        <img src="img/avatar/ava_13.jpg" alt="#">
        <a href="#">Cafe "Oki-Doki"</a>
        <i class="fa fa-thumbs-o-up"></i>3 likes
        </div>
        <div>
        <img src="img/avatar/ava_14.jpg" alt="#">
        <a href="#">Cafe "Oki-Doki"</a>
        <i class="fa fa-thumbs-o-up"></i>456 likes
        </div>
        <div>
        <img src="img/avatar/ava_15.jpg" alt="#">
        <a href="#">Cafe "Oki-Doki"</a>
        <i class="fa fa-thumbs-o-up"></i>698 likes
        </div>
        </div>
    </div>
    <!--Flickr-->
    <div class="flickr_photo">
        <h4>Flickr stream</h4>
        <ul id="basicuse" class="thumbs"></ul>
    </div>
<?php } ?>
    
    
<div id="_aggregateRating6" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" class="reviews">
    <div id="div_comentarios">
<!--reviews-->
<!--review-->
<?php 
    $first = true;
    foreach($comentarios as $c){ ?>
    <div <?php echo ($first ? 'itemprop="bestRating"' : '' ); ?> class="rev">
        <div class="user">
            <!--user avatar-->
            <a href="03.html" class="user_avatars">
                <div class="user_go">
                    <i class="fa fa-link"></i>
                </div>
                <img src="<?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_IMAGEM'] :
                            $imagem_anonimo ?>" alt="">
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
<?php 
       $first = false;
    } ?>
<!--review end-->
</div>
    
    

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
<script>
function enviar_curtida(nome,p_tipo) {
   
  $.ajax({
    type: "POST",
    url: "<?php echo ROOT_URL.'control/enviar_curtida.php'; ?>",
    data: {
      item: <?php echo $item_cdg ?>,
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
    url: "<?php echo ROOT_URL.'control/enviar_comentario.php?i='.$item_cdg ?>",
    data: {
      texto_comentario: $('#texto_comentario').val(),
      usuario: <?php echo isset($_SESSION['USUARIO_CDG']) ? $_SESSION['USUARIO_CDG'] : 1 ?>
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




<!--add comment-->
<div class="add_comment">
<h4>
    <span itemprop="ratingCount">
        <?php echo $total_comentarios;  echo ($total_comentarios > 1 ? ' Comentários' : ' Comentário') ?>.
    </span>
</h4>
<h4>Deixe a sua Avaliação.</h4> 

<input name="rating" value="0" id="rating_star" type="hidden" postID="1" />dddd

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

