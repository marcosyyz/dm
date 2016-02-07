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
             <h1  itemprop="name" >    <?php echo $Usuario->getNome(); ?></h1>
      
        </div>
    </div>

    <div class="container contant">
    <div class="row cont">
    <!-- Left column-->
    <div class="col-md-3 mobile_none sidebar">
    <div>
    
    <?php $img_user = str_replace('sz=50', 'sz=400', $Usuario->getImagem()); ?> 
      
    <div id="map_place" class="map_place">
       <img  style="height:254px; width:254px;" class="content_top_left"  src="<?php echo ($img_user == '' ? IMAGEM_ANONIMO : $img_user ) ?>" />
    </div>
    
    <!--Avaliados Place-->
    <div class="similar">
        <h3>Locais Avaliados:</h3>
        <?php 
        
        foreach($Usuario->lugares_avaliados() as $l){
            echo '<div>';
            echo '<img src="'.ROOT_URL.'view/img/uploads/mini/'.$l['ITEM_IMAGEM'].'" alt="'.$l['ITEM_NOME'].'">';
            echo '<a href="'.ROOT_URL.'lugares/'.$l['ITEM_URL'].'">'.$l['ITEM_NOME'].'</a>';
            echo '<i class="fa fa-thumbs-o-up"></i>'.$l['TOTAL_CURTIDAS'].' Likes';
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
        <div class="direita phone_email">
            <?php echo $_SESSION['USUARIO_CDG'] == $usuario_cdg ? '<a href="'.ROOT_URL.'control/cadastro/editar_perfil.php">Editar Perfil</a>' :'' ?>            
        </div>
        <br>
        <span class="phone_email"><i class="fa fa-globe"></i>                
                     <?php echo $Usuario->getCidade(); ?> , <?php echo $Usuario->getUF(); ?>
        </span>
    </div>


    <!--Phone info-->    
    <div  class="phone_email">        
        <span itemprop="telephone">
            <span><i class="fa fa-phone"></i> <?php echo $Usuario->getTelefone(); ?></span>            
        </span>
    </div>
          

    <p><br></p>
    
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


 
    
    